<?php

namespace modules\site\console\controllers;

use craft\console\Controller;
use craft\helpers\Console;
use modules\site\seed\BlockSeeder;
use modules\site\seed\Seed;
use modules\site\seed\SeedEntryOutcome;
use modules\site\seed\SeedException;
use modules\site\seed\SeedFieldOutcome;
use modules\site\seed\SeedImageOutcome;
use modules\site\seed\SeedOutcome;
use modules\site\seed\SeedRelationOutcome;
use yii\console\ExitCode;

/**
 * Adds Blocks with real content to an entry on the development site, and sets fields on the
 * entry itself, so a Block can be reviewed without anyone touching the control panel.
 *
 * @see docs/specs/content-seeding.md
 */
class SeedController extends Controller
{
    /**
     * @var bool Resolve and validate the Seed, print what it would do, and write nothing.
     */
    public bool $dryRun = false;

    public function options($actionID): array
    {
        return [...parent::options($actionID), 'dryRun'];
    }

    /**
     * Sets a Seed's entry fields and adds its Blocks to the entry it names, skipping any Block
     * already seeded.
     *
     * @param string $path Path to the Seed file.
     */
    public function actionBlocks(string $path): int
    {
        try {
            $seed = Seed::fromFile($path);
            $report = (new BlockSeeder())->apply($seed, $this->dryRun);
        } catch (SeedException $e) {
            $this->stderr("Error: {$e->getMessage()}\n", Console::FG_RED);

            return ExitCode::UNSPECIFIED_ERROR;
        }

        // The entry comes first, as it is created or switched before a Block is resolved at all.
        foreach ($report->entries as $entry) {
            $this->outputEntry($entry);
        }

        // Images and related entries follow, as they are resolved before the Block that names
        // them is built.
        foreach ($report->images as $image) {
            $this->outputImage($image);
        }

        foreach ($report->relations as $relation) {
            $this->outputRelation($relation);
        }

        // The entry's own fields follow the images they name, and come before the Blocks, which
        // is the order they are written in.
        foreach ($report->fields as $field) {
            $this->outputField($field);
        }

        foreach ($report->blocks as $outcome) {
            $this->outputOutcome($outcome);
        }

        $this->stdout(sprintf(
            "%d created, %d skipped, %d uploaded, %d reused, %d resolved, %d set%s.\n",
            count(array_filter($report->blocks, static fn(SeedOutcome $o): bool => $o->action === SeedOutcome::CREATED)),
            count(array_filter($report->blocks, static fn(SeedOutcome $o): bool => $o->action === SeedOutcome::SKIPPED)),
            count(array_filter($report->images, static fn(SeedImageOutcome $i): bool => $i->action === SeedImageOutcome::UPLOADED)),
            count(array_filter($report->images, static fn(SeedImageOutcome $i): bool => $i->action === SeedImageOutcome::REUSED)),
            count($report->relations),
            count($report->fields),
            $this->dryRun ? ' — dry run, nothing written' : '',
        ));

        return ExitCode::OK;
    }

    private function outputEntry(SeedEntryOutcome $entry): void
    {
        $wrote = $entry->action !== SeedEntryOutcome::SKIPPED;

        $this->stdout(sprintf('%-9s', $entry->action), $wrote ? Console::FG_GREEN : Console::FG_YELLOW);
        $this->stdout('entry  ');
        $this->stdout("“{$entry->slug}”", Console::FG_GREY);
        $this->stdout("  {$entry->detail}\n", Console::FG_CYAN);
    }

    private function outputImage(SeedImageOutcome $image): void
    {
        $this->stdout(sprintf('%-9s', $image->action), $image->action === SeedImageOutcome::UPLOADED ? Console::FG_GREEN : Console::FG_YELLOW);
        $this->stdout("{$image->filename}\n", Console::FG_GREY);
    }

    /**
     * One line per field the Seed set on the entry itself, so a Client Seed says what it wrote
     * even though it carries no Blocks at all.
     */
    private function outputField(SeedFieldOutcome $field): void
    {
        $this->stdout(sprintf('%-9s', SeedFieldOutcome::SET), Console::FG_GREEN);
        $this->stdout('field  ');
        $this->stdout("“{$field->handle}”", Console::FG_GREY);
        $this->stdout("  on “{$field->slug}”\n", Console::FG_CYAN);
    }

    /**
     * One line per entry an Entries field named, so the Seed's list of slugs can be read off
     * against the entries it found, in the order they will be written.
     */
    private function outputRelation(SeedRelationOutcome $relation): void
    {
        $this->stdout(sprintf('%-9s', 'resolved'), Console::FG_GREEN);
        $this->stdout("{$relation->field}  ");
        $this->stdout("“{$relation->slug}”", Console::FG_GREY);
        $this->stdout("  {$relation->title}\n", Console::FG_CYAN);
    }

    private function outputOutcome(SeedOutcome $outcome): void
    {
        $this->stdout(sprintf('%-9s', $outcome->action), $outcome->action === SeedOutcome::CREATED ? Console::FG_GREEN : Console::FG_YELLOW);
        $this->stdout("{$outcome->type}  ");
        $this->stdout(
            $outcome->key !== null
                ? "“{$outcome->key}”"
                : 'matched on type alone — this Block type has no text field, so a second one is never seeded',
            Console::FG_GREY,
        );

        $placement = self::placement($outcome);

        if ($placement !== null) {
            $this->stdout("  {$placement}", Console::FG_CYAN);
        }

        $this->stdout("\n");
    }

    /**
     * Where a created Block went, for the Blocks whose Seed named a neighbour. A Block with no
     * “after” key is simply appended, as every Block was before the key existed, and says nothing.
     */
    private static function placement(SeedOutcome $outcome): ?string
    {
        if ($outcome->after === null) {
            return null;
        }

        return $outcome->placedAfter
            ? "after {$outcome->after}"
            : "appended — no {$outcome->after} on this entry";
    }
}
