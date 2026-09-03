<?php

namespace modules\site\seed;

use Craft;
use craft\base\Element;
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
    public function __construct(
        private readonly ValueResolver $resolver = new ValueResolver(),
    ) {
    }

    /**
     * @return SeedOutcome[] one per Block in the Seed, in Seed order.
     * @throws SeedException if the Seed cannot be applied. Nothing is written.
     */
    public function apply(Seed $seed, bool $dryRun): array
    {
        $entry = $this->findEntry($seed->entry);
        $field = $this->findField($entry, $seed->field);

        $existing = $this->existingBlocks($entry, $field);
        $keys = array_map(fn(Entry $block): string => $this->keyFor($block->getType(), $this->matchTextOf($block)), $existing);

        $outcomes = [];
        $new = [];

        foreach ($seed->blocks as $seedBlock) {
            $type = $this->findEntryType($field, $seedBlock);
            $values = $this->resolveValues($type, $seedBlock);
            $textField = $this->firstTextField($type);
            $text = $textField !== null ? $this->matchText((string)($values[$textField->handle] ?? '')) : null;
            $key = $this->keyFor($type, $text);

            if (in_array($key, $keys, true)) {
                $outcomes[] = new SeedOutcome(SeedOutcome::SKIPPED, $type->handle, $text);
                continue;
            }

            $new[] = $this->buildBlock($entry, $field, $type, $values, $seedBlock);
            $keys[] = $key;
            $outcomes[] = new SeedOutcome(SeedOutcome::CREATED, $type->handle, $text);
        }

        if (!$dryRun && $new !== []) {
            $this->save($entry, $field, [...$existing, ...$new]);
        }

        return $outcomes;
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
     * @throws SeedException
     */
    private function findEntryType(Matrix $field, SeedBlock $block): EntryType
    {
        foreach ($field->getEntryTypes() as $type) {
            if ($type->handle === $block->type) {
                return $type;
            }
        }

        throw new SeedException(sprintf(
            'Block %d: field “%s” has no Block type “%s”. It takes: %s.',
            $block->position,
            $field->handle,
            $block->type,
            implode(', ', array_map(static fn(EntryType $type): string => $type->handle, $field->getEntryTypes())),
        ));
    }

    /**
     * Resolves every value in the Block by the type of the field it is written to, looked up
     * from the entry type's own field layout so instance handles work.
     *
     * @return array<string, mixed>
     * @throws SeedException
     */
    private function resolveValues(EntryType $type, SeedBlock $block): array
    {
        $layout = $type->getFieldLayout();
        $values = [];

        foreach ($block->fields as $handle => $value) {
            $field = $layout?->getFieldByHandle($handle);

            if ($field === null) {
                throw new SeedException(sprintf(
                    'Block %d (%s): no field “%s” on this Block type.',
                    $block->position,
                    $type->handle,
                    $handle,
                ));
            }

            try {
                $values[$handle] = $this->resolver->resolve($field, $value);
            } catch (SeedException $e) {
                throw new SeedException(sprintf('Block %d (%s): %s', $block->position, $type->handle, $e->getMessage()));
            }
        }

        return $values;
    }

    /**
     * @param array<string, mixed> $values
     * @throws SeedException if the built Block does not validate.
     */
    private function buildBlock(Entry $entry, Matrix $field, EntryType $type, array $values, SeedBlock $seedBlock): Entry
    {
        $block = new Entry();
        $block->typeId = $type->id;
        $block->fieldId = $field->id;
        $block->siteId = $entry->siteId;
        $block->setPrimaryOwner($entry);
        $block->setOwner($entry);
        $block->setFieldValues($values);
        $block->setScenario(Element::SCENARIO_LIVE);

        if (!$block->validate()) {
            throw new SeedException(sprintf(
                "Block %d (%s) is not valid:\n%s",
                $seedBlock->position,
                $type->handle,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $block->getErrorSummary(true),
                )),
            ));
        }

        return $block;
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
