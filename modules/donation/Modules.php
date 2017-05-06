<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 20/04/2017
 * Time: 1414:0404:2121
 */

namespace Modules\Donation;

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
                "Modules\\Donation\\Controllers" => __DIR__."/controllers/",
                "Modules\\Donation\\Models"      => __DIR__."/models/",
                "Modules\\Frontend\\Controllers"      => realpath(dirname(__FILE__))."/../frontend/controllers/",
                "Modules\\Program\\Models"      => realpath(dirname(__FILE__))."/../program/models/",
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