<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'grade' => [
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
