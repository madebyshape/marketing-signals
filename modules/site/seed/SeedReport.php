<?php

namespace modules\site\seed;

/**
 * Everything one run of a Seed did, for the command to print: what became of the target entry
 * and its own fields, what became of each Block, and what became of each image and each related
 * entry they named.
 */
readonly class SeedReport
{
    /**
     * @param SeedEntryOutcome[] $entries what the entry keys did, empty for a Seed without them.
     * @param SeedFieldOutcome[] $fields one per field set on the entry itself, in Seed order.
     * @param SeedOutcome[] $blocks one per Block in the Seed, in Seed order.
     * @param SeedImageOutcome[] $images one per image named, in the order they were resolved.
     * @param SeedRelationOutcome[] $relations one per entry an Entries field named, in the order
     *                                         they were resolved.
     */
    public function __construct(
        public array $entries,
        public array $fields,
        public array $blocks,
        public array $images,
        public array $relations,
    ) {
    }
}
