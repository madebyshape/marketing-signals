<?php

namespace modules\site\seed;

use Craft;
use craft\base\FieldInterface;
use craft\elements\Asset;
use craft\helpers\Assets;
use craft\models\Volume;

/**
 * Turns the filenames and paths an Assets field is given into asset IDs, uploading only what
 * the Seed's volume does not already hold.
 *
 * Matching is by filename alone, so a rerun reuses what the first run uploaded rather than
 * filling the volume with copies. A path is resolved relative to the Seed file, so a Seed and
 * its images travel together. A dry run resolves and reports the same way and uploads nothing.
 */
class AssetResolver
{
    /** @var SeedImageOutcome[] */
    private array $outcomes = [];

    private ?Volume $volume = null;

    public function __construct(
        private readonly string $volumeHandle,
        private readonly string $seedDirectory,
        private readonly bool $dryRun,
    ) {
    }

    /**
     * @return int[] the IDs to relate, in the order the Seed listed them. A dry run has no ID
     *               for an image it did not upload, so those are left out.
     * @throws SeedException if the value is not a list of paths, or an image cannot be found.
     */
    public function resolve(FieldInterface $field, mixed $value): array
    {
        if (!is_array($value) || !array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a list of image filenames or paths, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        $ids = [];

        foreach ($value as $path) {
            if (!is_string($path) || $path === '') {
                throw new SeedException(sprintf(
                    'Field “%s” takes a list of image filenames or paths, but one entry is %s.',
                    $field->handle,
                    get_debug_type($path),
                ));
            }

            $id = $this->one($field, $path);

            if ($id !== null) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    /**
     * @return SeedImageOutcome[]
     */
    public function outcomes(): array
    {
        return $this->outcomes;
    }

    /**
     * @throws SeedException
     */
    private function one(FieldInterface $field, string $path): ?int
    {
        $volume = $this->volume();
        $filename = basename($path);

        $existing = Asset::find()
            ->volumeId($volume->id)
            ->filename($filename)
            ->status(null)
            ->one();

        if ($existing !== null) {
            $this->outcomes[] = new SeedImageOutcome(SeedImageOutcome::REUSED, $existing->getFilename());

            return $existing->id;
        }

        $source = $this->source($field, $path, $filename);

        if ($this->dryRun) {
            $this->outcomes[] = new SeedImageOutcome(SeedImageOutcome::UPLOADED, $filename);

            return null;
        }

        return $this->upload($volume, $source, $filename);
    }

    /**
     * The file to upload from: the path as given if it is absolute, otherwise resolved against
     * the folder the Seed file sits in.
     *
     * @throws SeedException
     */
    private function source(FieldInterface $field, string $path, string $filename): string
    {
        $source = str_starts_with($path, '/') ? $path : $this->seedDirectory . '/' . $path;

        if (!is_file($source)) {
            throw new SeedException(sprintf(
                'Field “%s”: no image named “%s” in volume “%s”, and no file at %s.',
                $field->handle,
                $filename,
                $this->volumeHandle,
                $source,
            ));
        }

        return $source;
    }

    /**
     * Craft moves the file it is given, so the Seed's own copy is left alone and a temporary
     * one is handed over instead.
     *
     * @throws SeedException
     */
    private function upload(Volume $volume, string $source, string $filename): int
    {
        $temp = Assets::tempFilePath(pathinfo($filename, PATHINFO_EXTENSION));

        if (!copy($source, $temp)) {
            throw new SeedException("Image “{$filename}” could not be read from $source.");
        }

        $asset = new Asset();
        $asset->tempFilePath = $temp;
        $asset->setFilename($filename);
        $asset->newFolderId = Craft::$app->getAssets()->getRootFolderByVolumeId($volume->id)->id;
        $asset->setVolumeId($volume->id);
        $asset->avoidFilenameConflicts = true;
        $asset->setScenario(Asset::SCENARIO_CREATE);

        if (!Craft::$app->getElements()->saveElement($asset)) {
            throw new SeedException(sprintf(
                "Image “%s” could not be uploaded:\n%s",
                $filename,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $asset->getErrorSummary(true),
                )),
            ));
        }

        $this->outcomes[] = new SeedImageOutcome(SeedImageOutcome::UPLOADED, $asset->getFilename());

        return $asset->id;
    }

    /**
     * @throws SeedException
     */
    private function volume(): Volume
    {
        if ($this->volume === null) {
            $this->volume = Craft::$app->getVolumes()->getVolumeByHandle($this->volumeHandle)
                ?? throw new SeedException("Seed’s volume “{$this->volumeHandle}” does not exist.");
        }

        return $this->volume;
    }
}
