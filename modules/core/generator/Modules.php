<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 08/05/2017
 * Time: 2020:0505:5353
 */

namespace Modules\Generator;

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
                "Modules\\Generator\\Controllers" => __DIR__."/controllers/",
                "Modules\\Generator\\Models"      => __DIR__."/models/",
                "Modules\\Generator\\Plugin"      => __DIR__."/plugin/",
                "Modules\\Frontend\\Controllers"      => $config->modules->core."/frontend/controllers/",
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