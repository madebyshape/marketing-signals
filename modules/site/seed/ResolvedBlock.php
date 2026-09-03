<?php

namespace modules\site\seed;

use craft\models\EntryType;

/**
 * One Block of a Seed with its entry type found and its field values resolved, ready to be
 * built against an owner. The same shape is used for top-level Blocks and for the Blocks of a
 * nested Matrix.
 */
readonly class ResolvedBlock
{
    /**
     * @param array<string, mixed> $values by field handle. A value may be an OwnedValue, which
     *                                     is set once the Block itself exists.
     */
    public function __construct(
        public EntryType $type,
        public array $values,
        public int $position,
    ) {
    }
}
