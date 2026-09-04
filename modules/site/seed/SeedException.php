<?php

namespace modules\site\seed;

use yii\base\Exception;

/**
 * A Seed the command cannot apply: a bad file, a target it cannot find, a value it cannot
 * resolve, or a field type it does not handle. Every message names what went wrong, so the
 * command can print it and stop with nothing written.
 */
class SeedException extends Exception
{
    public function getName(): string
    {
        return 'Seed error';
    }
}
