<?php

use Phalcon\Config;

return new Config([
    'privateResources' => [
        'announcements' => [
            'index',
            'search',
            'edit',
            'create',
            'delete',
            'list',
            'get'
        ],
    ]
]);
