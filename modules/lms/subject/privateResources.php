<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'subject' => [
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
