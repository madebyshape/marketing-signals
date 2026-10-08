<?php
return [
    '*' => [
       'pluginName' => 'SEO',
       'alwaysIncludeCanonicalUrls' => true,
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
