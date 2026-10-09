<?php
return [
    '*' => [
       'pluginName' => 'SEO',
       'alwaysIncludeCanonicalUrls' => true,
       'separatorChar' => '-',
       'maxTitleLength' => 100,
    ],
    'dev' => [
        'environment' => 'local'
    ],
    'staging' => [
        'environment' => 'staging'
    ],
    'production' => [
        'environment' => 'live'
    ],
];
