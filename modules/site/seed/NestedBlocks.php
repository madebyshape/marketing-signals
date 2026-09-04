<?php

namespace modules\site\seed;

use craft\fields\Matrix;

/**
 * The resolved Blocks of a nested Matrix field, waiting for the Block that owns them to be
 * built. Nested Blocks are always created fresh with their parent, so there is nothing here to
 * match against.
 */
readonly class NestedBlocks implements OwnedValue
{
    /**
     * @param ResolvedBlock[] $blocks in Seed order.
     */
    public function __construct(
        public Matrix $field,
        public array $blocks,
    ) {
    }
}
