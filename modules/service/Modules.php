<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2121
 */

namespace Modules\Service;

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
                "Modules\\Service\\Controllers" => __DIR__."/controllers/",
                "Modules\\Service\\Models"      => __DIR__."/models/",
                "Modules\\Cms\\Models"      => realpath(dirname(__FILE__))."/../cms/models/",
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
        $view = $di->get('view');
        $view->setViewsDir(__DIR__. '/views/');
        $view->setMainView('main');
        $view->setLayoutsDir(APP_PATH.'/views/layouts/');
        $view->setLayout('private');
    }
}