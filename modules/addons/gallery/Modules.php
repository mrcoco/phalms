<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 10/01/2017
 * Time: 0909:0101:2626
 */

namespace Modules\Gallery;

use Phalcon\Loader;
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
        $config = $di->get('config');
        $loader->registerNamespaces(
            [
                "Modules\\Gallery\\Controllers" => __DIR__."/controllers/",
                "Modules\\Gallery\\Models"      => __DIR__."/models/",
                "Modules\\Frontend\\Controllers"      => $config->modules->core."frontend/controllers/",
                "Modules\\User\\Models"         => $config->modules->core."user/models/",
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