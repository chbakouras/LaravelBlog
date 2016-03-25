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
        ]
    ],
];