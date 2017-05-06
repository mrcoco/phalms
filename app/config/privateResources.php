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
        'program' => [
            'index',
            'list',
            'search',
            'location',
            'edit',
            'create',
            'get',
            'delete',
            'download'
        ],
        'service' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'page',
            'delete'
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
