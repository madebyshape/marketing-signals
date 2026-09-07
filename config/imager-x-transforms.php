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
    // The Service Carousel's Slide fills a 1520px card at the 1600 frame, so the widths run to
    // twice that for a retina screen. No ratio: the Thumbnail is cropped to its focal point by
    // the card, whatever shape it was uploaded in.
    'noRatioLarge' => [
        'transforms' => [
            ['width' => 760],
            ['width' => 1520],
            ['width' => 2280],
            ['width' => 3040]
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
    ],
    // The Case Study Slide's card is 750px wide at the 1600 frame, so the widths run to twice
    // that for a retina screen. 16x10 is the common ratio nearest the design's 750 by 471.
    '16x10' => [
        'transforms' => [
            ['width' => 400],
            ['width' => 800],
            ['width' => 1200],
            ['width' => 1500]
        ],
        'defaults' => [
            'ratio' => 16/10
        ]
    ]
];