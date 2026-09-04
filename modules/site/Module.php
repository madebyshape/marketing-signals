<?php

namespace modules\site;

use Craft;
use yii\base\Module as BaseModule;

/**
 * Site module.
 *
 * Site-level code that is not a plugin: console commands, and anything else the site needs
 * that Craft does not provide. Registered as `site` in `config/app.php`, so its console
 * commands run as `site/<controller>/<action>`.
 *
 * @see docs/adr/0002-seed-content-by-console-command.md
 */
class Module extends BaseModule
{
    public function init(): void
    {
        Craft::setAlias('@modules/site', __DIR__);

        $this->controllerNamespace = Craft::$app->getRequest()->getIsConsoleRequest()
            ? 'modules\\site\\console\\controllers'
            : 'modules\\site\\controllers';

        parent::init();
    }
}
