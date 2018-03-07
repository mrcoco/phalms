<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'classroom' => [
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
