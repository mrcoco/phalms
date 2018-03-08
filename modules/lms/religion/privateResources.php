<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'religion' => [
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
