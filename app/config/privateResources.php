<?php

use Phalcon\Config;
use Phalcon\Logger;

return new Config([
    'privateResources' => [
        'users' => [
            'index',
            'search',
            'edit',
            'create',
            'delete',
            'list',
            'get',
            'changePassword'
        ],
        'profiles' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
        ],
        'banner' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
       ],
        'gallery' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'gallery',
            'delete',
            'image',
            'imagelist',
            'imagecreate',
            'imageedit',
            'imagedelete'
        ],
        'blog' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
        ],
        'page' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
        ],
        'permissions' => [
            'index'
        ]
    ]
]);
