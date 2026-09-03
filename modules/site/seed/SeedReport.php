<?php

namespace modules\site\seed;

/**
 * Everything one run of a Seed did, for the command to print: what became of each Block, and
 * what became of each image the Blocks named.
 */
readonly class SeedReport
{
    /**
     * @param SeedOutcome[] $blocks one per Block in the Seed, in Seed order.
     * @param SeedImageOutcome[] $images one per image named, in the order they were resolved.
     */
    public function __construct(
        public array $blocks,
        public array $images,
    ) {
    }
}
