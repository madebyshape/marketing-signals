<?php

namespace modules\site\seed;

use craft\base\FieldInterface;
use craft\elements\Entry;

/**
 * Turns the slugs an Entries field is given into entry IDs, in the order the Seed listed them.
 *
 * A Seed names entries by slug and never by ID, and a link to an entry looks up through here
 * too, so both find the same entry. The entries already exist, so there is nothing to write and
 * a dry run resolves and reports exactly as a real run does. A slug that finds nothing stops the
 * run naming the field and the slug, the way a link's does.
 */
class EntriesResolver
{
    /** @var SeedRelationOutcome[] */
    private array $outcomes = [];

    /**
     * @return int[] the IDs to relate, in the order the Seed listed them. Craft keeps that order.
     * @throws SeedException if the value is not a list of slugs, or a slug names no entry.
     */
    public function resolve(FieldInterface $field, mixed $value): array
    {
        if (!is_array($value) || !array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a list of entry slugs, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        $ids = [];

        foreach ($value as $slug) {
            if (!is_string($slug) || $slug === '') {
                throw new SeedException(sprintf(
                    'Field “%s” takes a list of entry slugs, but one of them is %s.',
                    $field->handle,
                    get_debug_type($slug),
                ));
            }

            $entry = $this->find($slug)
                ?? throw new SeedException("Field “{$field->handle}”: no entry with the slug “{$slug}”.");

            $this->outcomes[] = new SeedRelationOutcome($field->handle, $slug, self::oneLine((string)$entry->title));
            $ids[] = $entry->id;
        }

        return $ids;
    }

    /**
     * @return SeedRelationOutcome[]
     */
    public function outcomes(): array
    {
        return $this->outcomes;
    }

    /**
     * The entry with this slug, if there is one. A link to an entry names it the same way, so it
     * looks up through here.
     */
    public function find(string $slug): ?Entry
    {
        return Entry::find()->slug($slug)->site('*')->unique()->status(null)->one();
    }

    /**
     * A title on one line: a Service title carries a newline the editor typed, and the output is
     * one line per entry.
     */
    private static function oneLine(string $title): string
    {
        return trim(preg_replace('/\s+/', ' ', $title));
    }
}
