<?php

namespace modules\site\seed;

/**
 * One entry an Entries field named: the field it goes in, the slug the Seed gave and the title
 * of the entry that slug found, so a reader can check the Seed's list line by line against what
 * the command resolved. A slug that finds nothing never reaches here — it stops the run.
 */
readonly class SeedRelationOutcome
{
    public function __construct(
        public string $field,
        public string $slug,
        public string $title,
    ) {
    }
}
