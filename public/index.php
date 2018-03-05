<?php
error_reporting(E_ALL);

/**
 * Define some useful constants
 */
define('APP_PATH', realpath('..') . '/app');
define('BASE_PATH', dirname(__DIR__));
// Use composer autoloader to load vendor classes
require_once BASE_PATH . '/vendor/autoload.php';
include BASE_PATH. '/app/config/Bootstrap.php';
if( ! file_exists(APP_PATH."/config/config.db.php"))
{
	if(is_dir(BASE_PATH . "/installer/"))
	{
		include BASE_PATH . '/installer/installer.php';
		include BASE_PATH . '/installer/lib/Database.php';
		include BASE_PATH . '/installer/lib/Mysql.php';
		include BASE_PATH . '/installer/lib/Pgsql.php';
		include BASE_PATH . '/installer/lib/Config.php';
		$app = new Installer();
		$app->run();
	}else{
		header('Status: 404');
		exit('Phalms is missing db config and cannot find the installer folder. Does your server have permission to access these files?');
	}
}else{
	try {
	    $app = new Bootstrap();
	    $app->run();

	} catch (Exception $e) {
		echo $e->getMessage(), '<br>';
		echo nl2br(htmlentities($e->getTraceAsString()));
	}
}