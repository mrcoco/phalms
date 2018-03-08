<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'majors' => [
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
