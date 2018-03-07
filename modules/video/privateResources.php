<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'video' => [
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
