<?php

namespace modules\site\seed;

use craft\base\FieldInterface;
use craft\ckeditor\Field as CkeditorField;
use craft\fields\Dropdown;
use craft\fields\PlainText;

/**
 * Turns a Seed's raw JSON value into the value a Craft field takes, chosen by the field's type.
 *
 * A type this does not handle is an error naming the field and its type, never a silent skip,
 * so a Seed can never half-apply. The remaining types — assets, nested Matrix, Content Block,
 * link, form, lightswitch, date and SEO — are added here as their tickets land.
 */
class ValueResolver
{
    /**
     * @throws SeedException if the value is wrong for the field, or the field's type is not handled.
     */
    public function resolve(FieldInterface $field, mixed $value): mixed
    {
        return match (true) {
            $field instanceof PlainText, $field instanceof CkeditorField => $this->text($field, $value),
            $field instanceof Dropdown => $this->option($field, $value),
            default => throw new SeedException(sprintf(
                'Field “%s” is a %s field (%s), which the Seed command does not handle.',
                $field->handle,
                $field->displayName(),
                $field::class,
            )),
        };
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
}
