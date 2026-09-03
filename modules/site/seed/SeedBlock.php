<?php

namespace modules\site\seed;

/**
 * One Block in a Seed: the entry type to create, and its field values by handle.
 */
readonly class SeedBlock
{
    public function __construct(
        public string $type,
        public array $fields,
        public int $position,
    ) {
    }
}
