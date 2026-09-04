<?php

namespace modules\site\seed;

/**
 * The resolved fields of a Content Block field, waiting for the element that owns them. Craft
 * builds the Content Block element itself from `['fields' => …]`, so only the values are
 * carried here.
 */
readonly class NestedContentBlock implements OwnedValue
{
    /**
     * @param array<string, mixed> $values by field handle, resolved by the same rules as a
     *                                     Block's own fields.
     */
    public function __construct(
        public array $values,
    ) {
    }
}
