<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2121
 */

namespace Modules\Session;

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
                "Modules\\Session\\Controllers" => __DIR__."/controllers/",
                "Modules\\Session\\Models"      => __DIR__."/models/",
                "Modules\\Session\\Forms"      => __DIR__."/forms/",
                "Modules\\Frontend\\Controllers"      => $config->modules->core."/frontend/controllers/",
                "Modules\\Banner\\Models"      => realpath(dirname(__FILE__))."/../banner/models/",
                "Modules\\User\\Models"      => realpath(dirname(__FILE__))."/../user/models/",
                "Modules\\Cms\\Models"      => realpath(dirname(__FILE__))."/../cms/models/",
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
        $view->setPartialsDir($config->application->partialDir);
    }
}