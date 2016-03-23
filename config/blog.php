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
            'thrashed' => 'thrashed',
            'draft' => 'draft',
        ],
    ],

    'show-all' => 'All',
];