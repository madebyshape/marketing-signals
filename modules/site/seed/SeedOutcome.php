<?php

namespace modules\site\seed;

/**
 * What the command did with one Block: created it, or skipped it because its match key was
 * already on the entry. `$key` is null for a Block whose entry type has no text field, which
 * matches on its type alone.
 *
 * A created Block also carries where it went: `$after` is the neighbour type its Seed named, if
 * any, and `$placedAfter` says whether the entry had one to follow.
 */
readonly class SeedOutcome
{
    public const CREATED = 'created';
    public const SKIPPED = 'skipped';

    private function __construct(
        public string $action,
        public string $type,
        public ?string $key,
        public ?string $after,
        public bool $placedAfter,
    ) {
    }

    /**
     * @param string|null $after the entry type handle the Block's “after” key named, if it has one.
     * @param bool $placedAfter whether a Block of that type was on the entry to follow. False with
     *                          an `$after` means the Block was appended for want of a neighbour.
     */
    public static function created(string $type, ?string $key, ?string $after, bool $placedAfter): self
    {
        return new self(self::CREATED, $type, $key, $after, $placedAfter);
    }

    /**
     * A Block already on the entry. It keeps its place, since “after” places new Blocks only and
     * never moves one that exists.
     */
    public static function skipped(string $type, ?string $key): self
    {
        return new self(self::SKIPPED, $type, $key, null, false);
    }
}
