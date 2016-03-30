<?php

/*
|--------------------------------------------------------------------------
| Blog Configuration
|--------------------------------------------------------------------------
|
| Here you may configure your blog data.
|
*/
return [
    'name' => 'Blog admin',
    'url' => '',

    'post' => [
        'status' => [
            'published' => 'published',
            'scheduled' => 'scheduled',
            'trashed' => 'trashed',
            'draft' => 'draft',
        ],
        'templates' => [
            'twoColumns' => 'theme.two-columns',
            'threeColumns' => 'theme.three-columns',
            'frontPage' => 'theme.front-page',
            'postDefault' => 'theme.two-columns',
            'pageDefault' => 'theme.three-columns',
        ],
    ],

    'show-all' => 'All',

    'auth' => [
        'status' => [
            'active' => 'Active',
            'notActive' => 'Not Active'
        ]
    ],

    'defaults' => [
        'auth' => [
            'status' => 'Not Active'
        ],
        'role' => [
            'admin' => 'admin',
            'editor' => 'editor',
            'subscriber' => 'subscriber',
        ],
    ],
];