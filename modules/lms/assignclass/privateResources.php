<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'assignclass' => [
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
