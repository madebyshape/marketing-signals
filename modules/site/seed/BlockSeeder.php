<?php

namespace modules\site\seed;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\ckeditor\Field as CkeditorField;
use craft\elements\Entry;
use craft\fields\Matrix;
use craft\fields\PlainText;
use craft\models\EntryType;

/**
 * Applies a Seed: appends its Blocks to the target entry's Matrix field, skipping any Block it
 * has already added.
 *
 * Every Block is built and validated before anything is written, and the entry is saved once,
 * so a bad Seed cannot half-apply. A dry run does the same work and saves nothing.
 */
class BlockSeeder
{
    /**
     * @throws SeedException if the Seed cannot be applied. Nothing is written.
     */
    public function apply(Seed $seed, bool $dryRun): SeedReport
    {
        $entry = $this->findEntry($seed->entry);
        $field = $this->findField($entry, $seed->field);

        $assets = new AssetResolver($seed->volume, $seed->directory(), $dryRun);
        $resolver = new ValueResolver($assets);

        $existing = $this->existingBlocks($entry, $field);
        $keys = array_map(fn(Entry $block): string => $this->keyFor($block->getType(), $this->matchTextOf($block)), $existing);

        $outcomes = [];
        $new = [];

        foreach ($seed->blocks as $seedBlock) {
            $resolved = $resolver->block($field, $seedBlock);
            $type = $resolved->type;
            $textField = $this->firstTextField($type);
            $text = $textField !== null ? $this->matchText((string)($resolved->values[$textField->handle] ?? '')) : null;
            $key = $this->keyFor($type, $text);

            if (in_array($key, $keys, true)) {
                $outcomes[] = new SeedOutcome(SeedOutcome::SKIPPED, $type->handle, $text);
                continue;
            }

            $new[] = $this->buildBlock($entry, $field, $resolved);
            $keys[] = $key;
            $outcomes[] = new SeedOutcome(SeedOutcome::CREATED, $type->handle, $text);
        }

        if (!$dryRun && $new !== []) {
            $this->save($entry, $field, [...$existing, ...$new]);
        }

        return new SeedReport($outcomes, $assets->outcomes());
    }

    /**
     * The Seed names its target by slug; `home` stands in for the home page, so a Seed never
     * has to know Craft's internal slug for it.
     *
     * @throws SeedException
     */
    private function findEntry(string $name): Entry
    {
        $query = Entry::find()->site('*')->unique()->status(null);

        if ($name === Seed::HOME) {
            $query->uri('__home__');
        } else {
            $query->slug($name);
        }

        $entry = $query->one();

        if ($entry === null) {
            throw new SeedException("No entry found for “{$name}”.");
        }

        return $entry;
    }

    /**
     * @throws SeedException
     */
    private function findField(Entry $entry, string $handle): Matrix
    {
        $field = $entry->getFieldLayout()?->getFieldByHandle($handle);

        if ($field === null) {
            throw new SeedException(sprintf(
                'Entry “%s” has no field “%s”.',
                $entry->title ?? $entry->slug,
                $handle,
            ));
        }

        if (!$field instanceof Matrix) {
            throw new SeedException(sprintf(
                'Field “%s” is a %s field, not a Matrix field, so Blocks cannot be added to it.',
                $handle,
                $field->displayName(),
            ));
        }

        return $field;
    }

    /**
     * Builds one Block against the element that owns it: the target entry for a top-level
     * Block, the parent Block for a nested one.
     *
     * @throws SeedException if the built Block does not validate.
     */
    private function buildBlock(ElementInterface $owner, Matrix $field, ResolvedBlock $resolved): Entry
    {
        $block = new Entry();
        $block->typeId = $resolved->type->id;
        $block->fieldId = $field->id;
        $block->siteId = $owner->siteId;
        $block->setPrimaryOwner($owner);
        $block->setOwner($owner);
        $this->applyValues($block, $resolved->values);
        $block->setScenario(Element::SCENARIO_LIVE);

        if (!$block->validate()) {
            throw new SeedException(sprintf(
                "Block %d (%s) is not valid:\n%s",
                $resolved->position,
                $resolved->type->handle,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $block->getErrorSummary(true),
                )),
            ));
        }

        return $block;
    }

    /**
     * Sets an element's resolved values on it. The plain ones go on together; the nested
     * Matrix and Content Block values need the element they belong to, so they follow.
     *
     * @param array<string, mixed> $values
     * @throws SeedException
     */
    private function applyValues(ElementInterface $element, array $values): void
    {
        $element->setFieldValues(self::plainValues($values));
        $this->applyOwnedValues($element, $values);
    }

    /**
     * @param array<string, mixed> $values
     * @throws SeedException
     */
    private function applyOwnedValues(ElementInterface $element, array $values): void
    {
        foreach ($values as $handle => $value) {
            if ($value instanceof NestedBlocks) {
                $this->applyNestedBlocks($element, $handle, $value);
            } elseif ($value instanceof NestedContentBlock) {
                $this->applyContentBlock($element, $handle, $value);
            }
        }
    }

    /**
     * Builds a nested Matrix's Blocks against the element that owns them and hands them to the
     * field, the same way the target entry is given its own.
     *
     * @throws SeedException
     */
    private function applyNestedBlocks(ElementInterface $element, string $handle, NestedBlocks $nested): void
    {
        $blocks = array_map(
            fn(ResolvedBlock $resolved): Entry => $this->buildBlock($element, $nested->field, $resolved),
            $nested->blocks,
        );

        $query = $element->getFieldValue($handle);
        $query->setCachedResult($blocks);
        $element->setFieldValue($handle, $query);
    }

    /**
     * Craft builds the Content Block element itself from the plain values, so it is read back
     * before the nested values inside it are set on it.
     *
     * @throws SeedException
     */
    private function applyContentBlock(ElementInterface $element, string $handle, NestedContentBlock $content): void
    {
        $element->setFieldValue($handle, ['fields' => self::plainValues($content->values)]);

        $this->applyOwnedValues($element->getFieldValue($handle), $content->values);
    }

    /**
     * @param array<string, mixed> $values
     * @return array<string, mixed> everything an element can be given up front.
     */
    private static function plainValues(array $values): array
    {
        return array_filter($values, static fn(mixed $value): bool => !$value instanceof OwnedValue);
    }

    /**
     * Saves the entry once with the new Blocks appended after the ones already on it. The
     * existing Blocks are passed through untouched, since Craft deletes any nested entry the
     * saved value leaves out.
     *
     * @param Entry[] $blocks
     * @throws SeedException
     */
    private function save(Entry $entry, Matrix $field, array $blocks): void
    {
        $value = $entry->getFieldValue($field->handle);
        $value->setCachedResult($blocks);

        // Setting it back marks the field dirty, which is what makes Craft save the Blocks.
        $entry->setFieldValue($field->handle, $value);

        if (!Craft::$app->getElements()->saveElement($entry)) {
            throw new SeedException(sprintf(
                "Entry “%s” could not be saved:\n%s",
                $entry->title ?? $entry->slug,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $entry->getErrorSummary(true),
                )),
            ));
        }
    }

    /**
     * Every Block already on the entry, disabled and drafted ones included, so that saving the
     * entry never drops one.
     *
     * @return Entry[]
     */
    private function existingBlocks(Entry $entry, Matrix $field): array
    {
        return Entry::find()
            ->fieldId($field->id)
            ->owner($entry)
            ->drafts(null)
            ->canonicalsOnly()
            ->savedDraftsOnly()
            ->status(null)
            ->limit(null)
            ->all();
    }

    /**
     * A Block's match key: its entry type handle plus the match text of the first plain text or
     * CKEditor field in its layout. A type with no text field matches on its type alone, so a
     * second Block of that type is never seeded.
     */
    private function keyFor(EntryType $type, ?string $text): string
    {
        return $type->handle . "\0" . ($text ?? '');
    }

    private function matchTextOf(Entry $block): ?string
    {
        $field = $this->firstTextField($block->getType());

        return $field !== null ? $this->matchText((string)$block->getFieldValue($field->handle)) : null;
    }

    /**
     * A text value with its tags stripped and its whitespace trimmed, so that a Seed's HTML and
     * the value Craft stored compare equal.
     */
    private function matchText(string $value): string
    {
        $value = html_entity_decode(preg_replace('/<[^>]*>/', ' ', $value), ENT_QUOTES | ENT_HTML5);

        return trim(preg_replace('/\s+/', ' ', $value));
    }

    private function firstTextField(EntryType $type): PlainText|CkeditorField|null
    {
        foreach ($type->getFieldLayout()?->getCustomFields() ?? [] as $field) {
            if ($field instanceof PlainText || $field instanceof CkeditorField) {
                return $field;
            }
        }

        return null;
    }
}
