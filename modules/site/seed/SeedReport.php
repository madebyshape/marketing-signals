<?php

namespace modules\site\seed;

/**
 * Everything one run of a Seed did, for the command to print: what became of the target entry,
 * what became of each Block, and what became of each image the Blocks named.
 */
readonly class SeedReport
{
    /**
     * @param SeedEntryOutcome[] $entries what the entry keys did, empty for a Seed without them.
     * @param SeedOutcome[] $blocks one per Block in the Seed, in Seed order.
     * @param SeedImageOutcome[] $images one per image named, in the order they were resolved.
     */
    public function __construct(
        public array $entries,
        public array $blocks,
        public array $images,
    ) {
    }
}
