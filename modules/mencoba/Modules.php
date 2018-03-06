<?php
/**
 * Created by Phalms Module Generator.
 *
 * mencoba
 *
 * @package 
 * @author  
 * @link    
 * @date:   2018-03-06
 * @time:   17:03:44
 * @license MIT
 */

namespace Modules\Mencoba;

use Phalcon\Loader;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                "Modules\\Mencoba\\Controllers" => __DIR__."/controllers/",
                "Modules\\Mencoba\\Models"      => __DIR__."/models/",
                "Modules\\Mencoba\\Plugin"      => __DIR__."/plugin/",
                "Modules\\Frontend\\Controllers"      => realpath(dirname(__FILE__))."/../frontend/controllers/",
            ]
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices(DiInterface $di)
    {
        // registering view
        $config = $di->get('config');
        $view = $di->get('view');
        $view->setViewsDir(__DIR__. '/views/');
        $view->setMainView('main');
        $view->setLayoutsDir($config->application->layoutsDir);
        $view->setPartialsDir($config->application->adminPartialDir );
        $view->setLayout('private');
    }
}