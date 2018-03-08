<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'webconfig' => [
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
