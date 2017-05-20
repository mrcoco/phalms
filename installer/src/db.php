<?php

use Phalcon\Config;
use Phalcon\Logger;

return new Config([
	'application' => [
        'publicUrl'      => '_URL_',
        'siteName'       => '_SITENAME_',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ],
    'database' => [
        'adapter' 	=> '_ADAPTER_',
        'host' 		=> '_HOST_',
        'username' 	=> '_USERNAME_',
        'password' 	=> '_PASSWORD_',
        'dbname' 	=> '_DBNAME_'
    ],
    'mail' => [
        'fromName' => 'Phalms',
        'fromEmail' => '_EMAIL_',
        'smtp' => [
            'server' => '_SMTPSERVER_',
            'port' => 587,
            'security' => 'tls',
            'username' => '_SMTPUSER_',
            'password' => '_SMTPPASS_'
        ]
    ],
]);
