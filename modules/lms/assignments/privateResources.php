<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'assignments' => [
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
