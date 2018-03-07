<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'discussions' => [
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
