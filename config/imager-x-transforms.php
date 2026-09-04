<?php

return [
    'noRatio' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => []
    ],
    '1x1' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 1/1
        ]
    ],
    '3x4' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 3/4
        ]
    ],
    '3x5' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 3/5
        ]
    ],
    '4x3' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 4/3
        ]
    ],
    '5x4' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 5/4
        ]
    ],
    '16x9' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200]
        ],
        'defaults' => [
            'ratio' => 16/9
        ]
    ]
];