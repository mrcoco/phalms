<?php
use Phalcon\Config;

return new Config([
    'privateResources' => [
        'submissions' => [
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
