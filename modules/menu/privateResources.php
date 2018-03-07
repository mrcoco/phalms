<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'menu' => [
            'index',
            'search',
            'edit',
            'create',
            'delete',
            'list',
            'get',
            'changePassword'
        ]
    ]
]);
