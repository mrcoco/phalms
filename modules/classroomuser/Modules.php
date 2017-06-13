<?php
/**
 * Created by Phalms Module Generator.
 *
 * ClassRoom User Module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    
 * @date:   2017-06-13
 * @time:   11:06:05
 * @license MIT
 */

namespace Modules\Classroomuser;

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
                "Modules\\Classroomuser\\Controllers" => __DIR__."/controllers/",
                "Modules\\Classroomuser\\Models"      => __DIR__."/models/",
                "Modules\\Classroomuser\\Plugin"      => __DIR__."/plugin/",
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