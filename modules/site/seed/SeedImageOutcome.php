<?php

namespace modules\site\seed;

/**
 * What the command did with one image an Assets field named: uploaded it into the Seed's
 * volume, or reused the one already there under that filename.
 */
readonly class SeedImageOutcome
{
    public const UPLOADED = 'uploaded';
    public const REUSED = 'reused';

    public function __construct(
        public string $action,
        public string $filename,
    ) {
    }
}
