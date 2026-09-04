<?php

namespace modules\site\seed;

use craft\base\FieldInterface;
use craft\ckeditor\Field as CkeditorField;
use craft\fields\Assets as AssetsField;
use craft\fields\ContentBlock as ContentBlockField;
use craft\fields\Date as DateField;
use craft\fields\Dropdown;
use craft\fields\Lightswitch;
use craft\fields\Link as LinkField;
use craft\fields\Matrix;
use craft\fields\PlainText;
use craft\helpers\DateTimeHelper;
use craft\models\EntryType;
use DateTime;
use nystudio107\seomatic\fields\SeoSettings;
use verbb\formie\elements\Form;
use verbb\formie\fields\Forms as FormsField;

/**
 * Turns a Seed's raw JSON value into the value a Craft field takes, chosen by the field's type.
 *
 * Every field type the project has is handled here. A type this does not know is an error
 * naming the field and its type, never a silent skip, so a Seed can never half-apply and a
 * Block using a new field type says so on the first run.
 *
 * Nested Matrix and Content Block values are resolved the same way, recursively, but cannot be
 * built until the element that owns them exists: those come back as an OwnedValue for the
 * seeder to set once it has built the Block.
 */
class ValueResolver
{
    private readonly LinkResolver $links;

    public function __construct(
        private readonly AssetResolver $assets,
    ) {
        $this->links = new LinkResolver($this->assets);
    }

    /**
     * Finds a Block's entry type on the Matrix field it is written to, and resolves each of its
     * values by the type of the field it goes in, looked up from the entry type's own field
     * layout so instance handles work.
     *
     * @throws SeedException if the Block names a type or field that is not there, or a value
     *                       the field cannot take.
     */
    public function block(Matrix $field, SeedBlock $block): ResolvedBlock
    {
        $type = $this->entryType($field, $block);
        $layout = $type->getFieldLayout();
        $values = [];

        foreach ($block->fields as $handle => $value) {
            $blockField = $layout?->getFieldByHandle($handle);

            if ($blockField === null) {
                throw new SeedException(sprintf(
                    'Block %d (%s): no field “%s” on this Block type.',
                    $block->position,
                    $type->handle,
                    $handle,
                ));
            }

            try {
                $values[$handle] = $this->resolve($blockField, $value);
            } catch (SeedException $e) {
                throw new SeedException(sprintf('Block %d (%s): %s', $block->position, $type->handle, $e->getMessage()));
            }
        }

        return new ResolvedBlock($type, $values, $block->position);
    }

    /**
     * @throws SeedException if the value is wrong for the field, or the field's type is not handled.
     */
    public function resolve(FieldInterface $field, mixed $value): mixed
    {
        return match (true) {
            $field instanceof PlainText, $field instanceof CkeditorField => $this->text($field, $value),
            $field instanceof Dropdown => $this->option($field, $value),
            $field instanceof Lightswitch => $this->boolean($field, $value),
            $field instanceof DateField => $this->date($field, $value),
            $field instanceof AssetsField => $this->assets->resolve($field, $value),
            $field instanceof LinkField => $this->links->resolve($field, $value),
            $field instanceof Matrix => $this->matrix($field, $value),
            $field instanceof ContentBlockField => $this->contentBlock($field, $value),
            $field instanceof FormsField => $this->form($field, $value),
            $field instanceof SeoSettings => $this->seo($field, $value),
            default => throw new SeedException(sprintf(
                'Field “%s” is a %s field (%s), which the Seed command does not handle.',
                $field->handle,
                $field->displayName(),
                $field::class,
            )),
        };
    }

    /**
     * @throws SeedException
     */
    private function entryType(Matrix $field, SeedBlock $block): EntryType
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
     * Plain text and CKEditor take the string as given; a CKEditor value carries its own
     * wrapper tag.
     *
     * @throws SeedException
     */
    private function text(FieldInterface $field, mixed $value): string
    {
        if (!is_string($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a string, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        return $value;
    }

    /**
     * A dropdown takes one of its option values, so a Seed reads like the project config.
     *
     * @throws SeedException
     */
    private function option(Dropdown $field, mixed $value): string
    {
        $values = array_map(
            static fn(array $option): string => (string)$option['value'],
            array_filter($field->options, static fn(array $option): bool => !isset($option['optgroup'])),
        );

        if (!is_string($value) || !in_array($value, $values, true)) {
            throw new SeedException(sprintf(
                'Field “%s” takes one of: %s. The Seed gives “%s”.',
                $field->handle,
                implode(', ', $values),
                is_scalar($value) ? (string)$value : get_debug_type($value),
            ));
        }

        return $value;
    }

    /**
     * A lightswitch takes a boolean, and only a boolean: a Seed saying `"true"` is a mistake
     * worth naming rather than quietly reading as on.
     *
     * @throws SeedException
     */
    private function boolean(Lightswitch $field, mixed $value): bool
    {
        if (!is_bool($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes true or false, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        return $value;
    }

    /**
     * A date takes an ISO 8601 string. It is parsed here rather than left to the field, which
     * turns anything it cannot read into null.
     *
     * @throws SeedException
     */
    private function date(DateField $field, mixed $value): DateTime
    {
        $date = is_string($value) ? DateTimeHelper::toDateTime($value) : false;

        if ($date === false) {
            throw new SeedException(sprintf(
                'Field “%s” takes an ISO 8601 date such as “2026-03-14”, but the Seed gives %s.',
                $field->handle,
                is_string($value) ? "“{$value}”" : get_debug_type($value),
            ));
        }

        return $date;
    }

    /**
     * A nested Matrix takes a list of Blocks in the same shape as the Seed's own, created fresh
     * with the Block that owns them.
     *
     * @throws SeedException
     */
    private function matrix(Matrix $field, mixed $value): NestedBlocks
    {
        if (!is_array($value) || !array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a list of Blocks, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        try {
            $blocks = array_map(
                fn(SeedBlock $block): ResolvedBlock => $this->block($field, $block),
                SeedBlock::listFromArray($value),
            );
        } catch (SeedException $e) {
            throw new SeedException("Field “{$field->handle}”: {$e->getMessage()}");
        }

        return new NestedBlocks($field, $blocks);
    }

    /**
     * A Content Block takes a map of field handle to value, resolved by these same rules.
     *
     * @throws SeedException
     */
    private function contentBlock(ContentBlockField $field, mixed $value): NestedContentBlock
    {
        if (!is_array($value) || ($value !== [] && array_is_list($value))) {
            throw new SeedException(sprintf(
                'Field “%s” takes a map of field handle to value, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        $layout = $field->getFieldLayout();
        $values = [];

        foreach ($value as $handle => $part) {
            $contentField = $layout->getFieldByHandle($handle);

            if ($contentField === null) {
                throw new SeedException("Field “{$field->handle}”: no field “{$handle}” on this Content Block.");
            }

            try {
                $values[$handle] = $this->resolve($contentField, $part);
            } catch (SeedException $e) {
                throw new SeedException("Field “{$field->handle}”: {$e->getMessage()}");
            }
        }

        return new NestedContentBlock($values);
    }

    /**
     * A form field takes a Formie form handle. Like every other relation the Seed writes, it is
     * stored as the ID the handle resolves to.
     *
     * @return int[]
     * @throws SeedException
     */
    private function form(FormsField $field, mixed $value): array
    {
        if (!is_string($value) || $value === '') {
            throw new SeedException(sprintf(
                'Field “%s” takes a form handle, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        $form = Form::find()->handle($value)->status(null)->one()
            ?? throw new SeedException("Field “{$field->handle}”: no form with the handle “{$value}”.");

        return [$form->id];
    }

    /**
     * SEO settings take a map of setting keys to values. The field merges it over the value it
     * already holds, so a Seed names only the settings it cares about.
     *
     * @return array<string, mixed>
     * @throws SeedException
     */
    private function seo(SeoSettings $field, mixed $value): array
    {
        if (!is_array($value) || $value === [] || array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a map of SEO setting keys to values, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        return $value;
    }
}
