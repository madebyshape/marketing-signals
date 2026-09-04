<?php

namespace modules\site\seed;

/**
 * A resolved value that cannot be built until the element owning it exists: a nested Matrix's
 * Blocks, or a Content Block's fields. The resolver produces one of these, and the seeder sets
 * it on the element it has just built rather than passing it in with the plain values.
 */
interface OwnedValue
{
}
