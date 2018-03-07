<?php

use Phalcon\Config;
use Phalcon\Logger;

return new Config([
	'application' => [
        'publicUrl'      => 'phalms.app',
        'siteName'       => 'phalms',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ],
    'database' => [
        'adapter' 	=> 'Postgresql',
        'host' 		=> 'localhost',
        'username' 	=> 'postgres',
        'password' 	=> 'postgres',
        'dbname' 	=> 'phalms'
    ],
    'mail' => [
        'fromName' => 'Phalms',
        'fromEmail' => '',
        'smtp' => [
            'server' => '',
            'port' => 587,
            'security' => 'tls',
            'username' => '',
            'password' => ''
        ]
    ],
]);
