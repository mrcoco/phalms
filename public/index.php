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

try {
    $app = new Bootstrap();
    $app->run();

} catch (Exception $e) {
	echo $e->getMessage(), '<br>';
	echo nl2br(htmlentities($e->getTraceAsString()));
}
