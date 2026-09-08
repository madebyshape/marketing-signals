<?php

namespace modules\site\seed;

use craft\helpers\DateTimeHelper;
use DateTime;

/**
 * A parsed Seed file: the entry it targets, the fields it sets on that entry, the Matrix field
 * it writes to, and the Blocks it adds. Seeds are throwaway JSON files under `.scratch/`; the
 * shape is in `docs/specs/content-seeding.md`.
 */
readonly class Seed
{
    /** The entry name that stands in for the site's home page. */
    public const HOME = 'home';

    /** The Matrix field a Seed writes to unless it names another. */
    public const DEFAULT_FIELD = 'blocks';

    /** The asset volume a Seed's images are matched in and uploaded to unless it names another. */
    public const DEFAULT_VOLUME = 'images';

    /** Keys a Seed may carry. */
    private const KEYS = ['entry', 'field', 'volume', 'section', 'type', 'title', 'parent', 'postDate', 'fields', 'blocks'];

    /**
     * @param string|null $section the section the entry lives in. Given, the command creates the
     *                             entry when the section has none with the Seed's slug; missing,
     *                             the entry must already exist.
     * @param string|null $type the entry type to create the entry as, or to switch an existing
     *                          entry to. Missing, a created entry takes its section's only type.
     * @param string|null $title the title a created entry is given.
     * @param string|null $parent the slug, in the same section, a created entry is placed under.
     *                            Missing, it goes at the end of the structure.
     * @param array<string, mixed> $fields the fields set on the entry itself, handle to raw
     *                                     value, resolved by the same rules as a Block's fields.
     *                                     Empty for a Seed that only adds Blocks.
     * @param SeedBlock[] $blocks
     */
    private function __construct(
        public string $path,
        public string $entry,
        public string $field,
        public string $volume,
        public ?string $section,
        public ?string $type,
        public ?string $title,
        public ?string $parent,
        public ?DateTime $postDate,
        public array $fields,
        public array $blocks,
    ) {
    }

    /**
     * Where a Seed's relative image paths are resolved from, so that a Seed and its images
     * travel together.
     */
    public function directory(): string
    {
        return dirname($this->path);
    }

    /**
     * @throws SeedException if the file is missing, is not JSON, or is not a Seed.
     */
    public static function fromFile(string $path): self
    {
        if (!is_file($path)) {
            throw new SeedException("Seed file not found: $path");
        }

        try {
            $data = json_decode(file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new SeedException("Seed file is not valid JSON: $path ({$e->getMessage()})");
        }

        if (!is_array($data) || array_is_list($data)) {
            throw new SeedException("Seed file must contain a JSON object: $path");
        }

        foreach (array_keys($data) as $key) {
            if (!in_array($key, self::KEYS, true)) {
                throw new SeedException(sprintf(
                    'Seed has an unknown key “%s”. A Seed takes: %s.',
                    $key,
                    implode(', ', self::KEYS),
                ));
            }
        }

        if (!isset($data['entry']) || !is_string($data['entry']) || $data['entry'] === '') {
            throw new SeedException('Seed must name the entry it targets in “entry”.');
        }

        $field = $data['field'] ?? self::DEFAULT_FIELD;

        if (!is_string($field) || $field === '') {
            throw new SeedException('Seed’s “field” must be a Matrix field handle.');
        }

        $volume = $data['volume'] ?? self::DEFAULT_VOLUME;

        if (!is_string($volume) || $volume === '') {
            throw new SeedException('Seed’s “volume” must be an asset volume handle.');
        }

        $section = self::handle($data, 'section');
        $type = self::handle($data, 'type');
        $title = self::handle($data, 'title');
        $parent = self::handle($data, 'parent');
        $postDate = self::postDate($data);

        // These describe an entry being created, which only “section” asks for.
        foreach (['title' => $title, 'parent' => $parent, 'postDate' => $postDate] as $key => $value) {
            if ($value !== null && $section === null) {
                throw new SeedException(sprintf(
                    'Seed’s “%s” only applies to an entry the command creates, so it needs “section” too.',
                    $key,
                ));
            }
        }

        $fields = $data['fields'] ?? [];

        if (!is_array($fields) || ($fields !== [] && array_is_list($fields))) {
            throw new SeedException('Seed’s “fields” must be a map of field handle to value.');
        }

        // A Seed that sets entry fields need carry no Blocks: a Client is a title and a Logo,
        // with no Matrix field to write to at all.
        $blocks = $data['blocks'] ?? ($fields !== [] ? [] : null);

        if (!is_array($blocks) || !array_is_list($blocks)) {
            throw new SeedException(
                'Seed must carry a list of Blocks in “blocks”, a map of entry fields in “fields”, or both.',
            );
        }

        return new self(
            $path,
            $data['entry'],
            $field,
            $volume,
            $section,
            $type,
            $title,
            $parent,
            $postDate,
            $fields,
            SeedBlock::listFromArray($blocks),
        );
    }

    /**
     * The post date, parsed here rather than left to Craft, which turns anything it cannot read
     * into the moment of the save. It is read in the site's own timezone, since a Seed's date is
     * the calendar date the design shows, not an instant.
     *
     * @param array<string, mixed> $data
     * @throws SeedException
     */
    private static function postDate(array $data): ?DateTime
    {
        $value = $data['postDate'] ?? null;

        if ($value === null) {
            return null;
        }

        $date = is_string($value) ? DateTimeHelper::toDateTime($value, assumeSystemTimeZone: true) : false;

        if ($date === false) {
            throw new SeedException(sprintf(
                'Seed’s “postDate” takes an ISO 8601 date such as “2026-03-14”, but the Seed gives %s.',
                is_string($value) ? "“{$value}”" : get_debug_type($value),
            ));
        }

        return $date;
    }

    /**
     * One of the optional entry keys, which are all non-empty strings when they are there at all.
     *
     * @param array<string, mixed> $data
     * @throws SeedException
     */
    private static function handle(array $data, string $key): ?string
    {
        $value = $data[$key] ?? null;

        if ($value === null) {
            return null;
        }

        if (!is_string($value) || $value === '') {
            throw new SeedException("Seed’s “{$key}” must be a non-empty string.");
        }

        return $value;
    }
}
