<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2121
 */

namespace Modules\User;

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
                "Modules\\User\\Controllers"    => __DIR__."/controllers/",
                "Modules\\User\\Models"         => __DIR__."/models/",
                "Modules\\User\\Forms"          => __DIR__."/forms/",
                "Modules\\Frontend\\Controllers"      => $config->modules->core."/frontend/controllers/",
                "Modules\\Banner\\Models"       => $config->modules->addons."/banner/models/",
                "Modules\\Cms\\Models"          => $config->modules->addons."/cms/models/",
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
    }
}