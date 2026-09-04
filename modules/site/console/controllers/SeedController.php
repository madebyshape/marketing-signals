<?php

namespace modules\site\console\controllers;

use craft\console\Controller;
use craft\helpers\Console;
use modules\site\seed\BlockSeeder;
use modules\site\seed\Seed;
use modules\site\seed\SeedException;
use modules\site\seed\SeedImageOutcome;
use modules\site\seed\SeedOutcome;
use yii\console\ExitCode;

/**
 * Adds Blocks with real content to an entry on the development site, so a Block can be reviewed
 * without anyone touching the control panel.
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
     * Appends a Seed's Blocks to the entry it names, skipping any Block already seeded.
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

        // Images come first, as they are resolved before the Block that names them is built.
        foreach ($report->images as $image) {
            $this->outputImage($image);
        }

        foreach ($report->blocks as $outcome) {
            $this->outputOutcome($outcome);
        }

        $this->stdout(sprintf(
            "%d created, %d skipped, %d uploaded, %d reused%s.\n",
            count(array_filter($report->blocks, static fn(SeedOutcome $o): bool => $o->action === SeedOutcome::CREATED)),
            count(array_filter($report->blocks, static fn(SeedOutcome $o): bool => $o->action === SeedOutcome::SKIPPED)),
            count(array_filter($report->images, static fn(SeedImageOutcome $i): bool => $i->action === SeedImageOutcome::UPLOADED)),
            count(array_filter($report->images, static fn(SeedImageOutcome $i): bool => $i->action === SeedImageOutcome::REUSED)),
            $this->dryRun ? ' — dry run, nothing written' : '',
        ));

        return ExitCode::OK;
    }

    private function outputImage(SeedImageOutcome $image): void
    {
        $this->stdout(sprintf('%-9s', $image->action), $image->action === SeedImageOutcome::UPLOADED ? Console::FG_GREEN : Console::FG_YELLOW);
        $this->stdout("{$image->filename}\n", Console::FG_GREY);
    }

    private function outputOutcome(SeedOutcome $outcome): void
    {
        $this->stdout(sprintf('%-9s', $outcome->action), $outcome->action === SeedOutcome::CREATED ? Console::FG_GREEN : Console::FG_YELLOW);
        $this->stdout("{$outcome->type}  ");
        $this->stdout(
            $outcome->key !== null
                ? "“{$outcome->key}”\n"
                : "matched on type alone — this Block type has no text field, so a second one is never seeded\n",
            Console::FG_GREY,
        );
    }
}
