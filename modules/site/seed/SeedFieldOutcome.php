<?php

namespace modules\site\seed;

/**
 * One field a Seed set on the entry it targets, rather than on a Block. A Client is a title and
 * a Logo with no Matrix field of its own, which is what entry-level fields are for.
 *
 * There is one action: a field the Seed names is written every run. The value is resolved the
 * same way each time — an image by filename in the volume — so a rerun sets what is already
 * there and creates nothing.
 */
readonly class SeedFieldOutcome
{
    public const SET = 'set';

    public function __construct(
        public string $handle,
        public string $slug,
    ) {
    }
}
