<?php

namespace modules\site\seed;

/**
 * What the command did with one Block: created it, or skipped it because its match key was
 * already on the entry. `$key` is null for a Block whose entry type has no text field, which
 * matches on its type alone.
 */
readonly class SeedOutcome
{
    public const CREATED = 'created';
    public const SKIPPED = 'skipped';

    public function __construct(
        public string $action,
        public string $type,
        public ?string $key,
    ) {
    }
}
