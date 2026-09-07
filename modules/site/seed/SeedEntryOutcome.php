<?php

namespace modules\site\seed;

/**
 * What the command did with the entry a Seed targets, before it wrote a single Block: created it
 * because its section had no entry with the Seed's slug, found the one already there, switched
 * its entry type, or left a type that already matched alone.
 *
 * A Seed without the entry keys reports nothing here, since the entry it names has always had to
 * exist and saying so every run would be noise.
 */
readonly class SeedEntryOutcome
{
    public const CREATED = 'created';
    public const SWITCHED = 'switched';
    public const SKIPPED = 'skipped';

    private function __construct(
        public string $action,
        public string $slug,
        public string $detail,
    ) {
    }

    /**
     * @param string $section the section handle the entry was created in.
     * @param string $type the entry type handle it was created as.
     * @param string|null $parent the slug it was placed under, or null for the end of the structure.
     */
    public static function created(string $slug, string $section, string $type, ?string $parent): self
    {
        return new self(self::CREATED, $slug, sprintf(
            '%s in %s, %s',
            $type,
            $section,
            $parent !== null ? "under “{$parent}”" : 'at the end of the structure',
        ));
    }

    /**
     * An entry the section already held, so a rerun of the Seed that created it writes no second
     * copy.
     */
    public static function found(string $slug, string $section): self
    {
        return new self(self::SKIPPED, $slug, "already in $section");
    }

    public static function switched(string $slug, string $from, string $to): self
    {
        return new self(self::SWITCHED, $slug, "$from → $to");
    }

    /**
     * An entry whose type is the one the Seed names, so there is nothing to switch.
     */
    public static function unchanged(string $slug, string $type): self
    {
        return new self(self::SKIPPED, $slug, "type is already $type");
    }
}
