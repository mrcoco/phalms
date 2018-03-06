<?php

use Phalcon\Config;

return new Config([
    'privateResources' => [
        'mencoba' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
        ],
    ]
]);
