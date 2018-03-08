<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'student' => [
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
