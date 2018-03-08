<?php

use Phalcon\Config;

return new Config([
    'privateResources' => [
        'school' => [
            'index',
            'search',
            'edit',
            'create',
            'delete',
            'list',
            'get',
        ],
    ]
]);