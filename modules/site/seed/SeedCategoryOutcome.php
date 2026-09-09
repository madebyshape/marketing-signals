<?php

namespace modules\site\seed;

/**
 * What the command did with one category a Categories field named: found it by title in the
 * field's group, or created it there under that title.
 */
readonly class SeedCategoryOutcome
{
    public const CREATED = 'created';
    public const RESOLVED = 'resolved';

    public function __construct(
        public string $action,
        public string $field,
        public string $title,
        public string $group,
    ) {
    }
}
