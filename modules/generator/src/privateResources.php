<?php

use Phalcon\Config;

return new Config([
    'privateResources' => [
        '{module_name_l}' => [
            'index',
            'list',
            'search',
            'edit',
            'create',
            'get',
            'delete'
        ],
    ]
]);
