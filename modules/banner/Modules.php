<?php
/**
 * Created by PhpStorm.
 * User: dwiagus
 * Date: 10/6/2016
 * Time: 9:06 PM
 */

namespace Modules\Banner;
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

        $loader->registerNamespaces(
            [
                "Modules\\Banner\\Controllers" => __DIR__."/controllers/",
                "Modules\\Banner\\Models"      => __DIR__."/models/",
                "Modules\\Frontend\\Controllers" => realpath(dirname(__FILE__))."/../frontend/controllers/",
                "Modules\\User\\Models" => realpath(dirname(__FILE__))."/../user/models/",
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
        $view = $di->get('view');
        $view->setViewsDir(__DIR__. '/views/');
        $view->setMainView('main');
        $view->setLayoutsDir(APP_PATH.'/views/layouts/');
        $view->setLayout('private');
    }
}

