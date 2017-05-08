<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces([
    'Phalms\Models'      => $config->application->modelsDir,
    'Phalms\Controllers' => $config->application->controllersDir,
    'Phalms\Forms'       => $config->application->formsDir,
    'Phalms'             => $config->application->libraryDir,
    'Modules'            => $config->application->modulesDir,
    'Extend'             => $config->application->extendDir,
    'Plugins'            => $config->application->pluginDir,
    
]);

$loader->register();

// Use composer autoloader to load vendor classes
require_once BASE_PATH . '/vendor/autoload.php';
