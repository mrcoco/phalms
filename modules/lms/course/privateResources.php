<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'course' => [
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
