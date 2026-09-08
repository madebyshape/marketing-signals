<?php

namespace modules\site\seed;

use Craft;
use craft\elements\Entry;
use craft\models\EntryType;
use craft\models\Section;

/**
 * Finds the entry a Seed targets, and — when the Seed names a `section` — creates it when that
 * section holds none with the Seed's slug, so a Seed can reach a page nobody has made yet.
 *
 * A rerun finds what the first run created and skips creation. A `type` on an entry that already
 * exists switches it. Nothing here updates a title, a slug, a parent or a post date: the keys
 * create and switch, and an entry is the editor's from then on. A dry run resolves and reports
 * the same way and saves nothing.
 */
class EntrySeeder
{
    /** @var SeedEntryOutcome[] */
    private array $outcomes = [];

    public function __construct(
        private readonly Seed $seed,
        private readonly bool $dryRun,
    ) {
    }

    /**
     * @return SeedEntryOutcome[] what became of the entry, for the command to print. Empty for a
     *                            Seed that carries none of the entry keys.
     */
    public function outcomes(): array
    {
        return $this->outcomes;
    }

    /**
     * @throws SeedException if the entry cannot be found and the Seed gives no way to create it,
     *                       or if a key names a section, type or parent that does not exist.
     */
    public function entry(): Entry
    {
        $entry = $this->find();

        if ($entry === null) {
            if ($this->seed->section === null) {
                throw new SeedException("No entry found for “{$this->seed->entry}”.");
            }

            return $this->create();
        }

        if ($this->seed->section !== null) {
            $this->outcomes[] = SeedEntryOutcome::found($this->seed->entry, $this->seed->section);
        }

        $this->switchType($entry);

        return $entry;
    }

    /**
     * The Seed names its target by slug; `home` stands in for the home page, so a Seed never has
     * to know Craft's internal slug for it. A `section` narrows the search to that section, so
     * that a slug shared with another section still finds the right entry.
     *
     * @throws SeedException
     */
    private function find(): ?Entry
    {
        $query = Entry::find()->site('*')->unique()->status(null);

        if ($this->seed->entry === Seed::HOME) {
            $query->uri('__home__');
        } else {
            $query->slug($this->seed->entry);
        }

        if ($this->seed->section !== null) {
            $query->section($this->section()->handle);
        }

        return $query->one();
    }

    /**
     * A new entry, enabled, under its parent when the Seed names one and at the end of the
     * structure otherwise, posted on the date the Seed gives and at the moment of the save
     * without one. A dry run builds it and stops, so that the Blocks are still resolved and
     * validated against the entry type they would be written to.
     *
     * @throws SeedException
     */
    private function create(): Entry
    {
        $section = $this->section();
        $type = $this->createType($section);
        $parent = $this->seed->parent !== null ? $this->parent($section) : null;

        $entry = new Entry();
        $entry->sectionId = $section->id;
        $entry->setTypeId($type->id);
        $entry->siteId = Craft::$app->getSites()->getPrimarySite()->id;
        $entry->slug = $this->seed->entry;
        $entry->title = $this->seed->title;
        $entry->enabled = true;

        if ($this->seed->postDate !== null) {
            $entry->postDate = $this->seed->postDate;
        }

        if ($parent !== null) {
            $entry->setParentId($parent->id);
        }

        $this->outcomes[] = SeedEntryOutcome::created(
            $this->seed->entry,
            $section->handle,
            $type->handle,
            $parent?->slug,
        );

        if ($this->seed->postDate !== null) {
            $this->outcomes[] = SeedEntryOutcome::posted($this->seed->entry, $this->seed->postDate);
        }

        if (!$this->dryRun) {
            $this->save($entry);
        }

        return $entry;
    }

    /**
     * Switches an existing entry to the type the Seed names, in memory as well as in the database
     * so that the Blocks are resolved against the layout the entry ends the run with.
     *
     * @throws SeedException
     */
    private function switchType(Entry $entry): void
    {
        if ($this->seed->type === null) {
            return;
        }

        $current = $entry->getType();

        if ($current->handle === $this->seed->type) {
            $this->outcomes[] = SeedEntryOutcome::unchanged($this->seed->entry, $current->handle);

            return;
        }

        $type = $this->switchTo($entry);
        $entry->setTypeId($type->id);

        $this->outcomes[] = SeedEntryOutcome::switched($this->seed->entry, $current->handle, $type->handle);

        if (!$this->dryRun) {
            $this->save($entry);
        }
    }

    /**
     * @throws SeedException if the section the Seed names does not exist.
     */
    private function section(): Section
    {
        $section = Craft::$app->getEntries()->getSectionByHandle($this->seed->section);

        if ($section === null) {
            throw new SeedException("Seed’s “section” names “{$this->seed->section}”, which is not a section on this site.");
        }

        return $section;
    }

    /**
     * The entry type a created entry takes: the one the Seed names, or the section's own when it
     * has only one and the Seed names none.
     *
     * @throws SeedException
     */
    private function createType(Section $section): EntryType
    {
        $types = $section->getEntryTypes();

        if ($this->seed->type === null) {
            if (count($types) !== 1) {
                throw new SeedException(sprintf(
                    'Seed must name the entry type to create “%s” as in “type”, since section “%s” has more than one: %s.',
                    $this->seed->entry,
                    $section->handle,
                    self::handles($types),
                ));
            }

            return $types[0];
        }

        return $this->typeNamed($types, $section->handle);
    }

    /**
     * The entry type an existing entry is switched to, checked against its own section so that a
     * type from elsewhere is an error rather than a save that Craft refuses.
     *
     * @throws SeedException
     */
    private function switchTo(Entry $entry): EntryType
    {
        $section = $entry->getSection();

        if ($section === null) {
            throw new SeedException("Entry “{$this->seed->entry}” is not in a section, so its type cannot be switched.");
        }

        return $this->typeNamed($section->getEntryTypes(), $section->handle);
    }

    /**
     * @param EntryType[] $types
     * @throws SeedException
     */
    private function typeNamed(array $types, string $section): EntryType
    {
        foreach ($types as $type) {
            if ($type->handle === $this->seed->type) {
                return $type;
            }
        }

        throw new SeedException(sprintf(
            'Seed’s “type” names “%s”, which section “%s” has no entry type for. It takes: %s.',
            $this->seed->type,
            $section,
            self::handles($types),
        ));
    }

    /**
     * @throws SeedException if the parent the Seed names is not in the section.
     */
    private function parent(Section $section): Entry
    {
        $parent = Entry::find()
            ->section($section->handle)
            ->slug($this->seed->parent)
            ->site('*')
            ->unique()
            ->status(null)
            ->one();

        if ($parent === null) {
            throw new SeedException(sprintf(
                'Seed’s “parent” names “%s”, which section “%s” has no entry for.',
                $this->seed->parent,
                $section->handle,
            ));
        }

        return $parent;
    }

    /**
     * @throws SeedException
     */
    private function save(Entry $entry): void
    {
        if (!Craft::$app->getElements()->saveElement($entry)) {
            throw new SeedException(sprintf(
                "Entry “%s” could not be saved:\n%s",
                $this->seed->entry,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $entry->getErrorSummary(true),
                )),
            ));
        }
    }

    /**
     * @param EntryType[] $types
     */
    private static function handles(array $types): string
    {
        return implode(', ', array_map(static fn(EntryType $type): string => $type->handle, $types));
    }
}
