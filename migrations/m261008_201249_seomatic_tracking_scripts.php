<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\Seomatic;

/**
 * Turns on SEOmatic's sitewide Tracking Scripts with the client's IDs.
 */
class m261008_201249_seomatic_tracking_scripts extends Migration
{
    // GA4 (G-5XPTMGB1SQ) fires through GTM, so it gets no tag of its own.
    private const SCRIPTS = [
        'googleTagManager' => [
            'googleTagManagerId' => 'GTM-T2XS3WX',
        ],
        'gtag' => [
            'googleAnalyticsId' => 'GT-KFN42SM',
            'googleAdWordsId' => 'AW-975442903',
            'displayFeatures' => true,
        ],
        'facebookPixel' => [
            'facebookPixelId' => '1470273170746823',
        ],
    ];

    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        foreach (Craft::$app->getSites()->getAllSiteIds() as $siteId) {
            Seomatic::$previewingMetaContainers = true;
            $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
            Seomatic::$previewingMetaContainers = false;

            if (!$metaBundle) {
                continue;
            }

            foreach ($metaBundle->metaContainers as $metaContainer) {
                if ($metaContainer::CONTAINER_TYPE !== MetaScriptContainer::CONTAINER_TYPE) {
                    continue;
                }

                foreach (self::SCRIPTS as $handle => $vars) {
                    $script = $metaContainer->getData($handle);

                    if (!$script) {
                        continue;
                    }

                    $script->include = true;

                    foreach ($vars as $key => $value) {
                        $script->vars[$key]['value'] = $value;
                    }
                }
            }

            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);
        }

        Seomatic::$plugin->clearAllCaches();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m261008_201249_seomatic_tracking_scripts cannot be reverted.\n";
        return false;
    }
}
