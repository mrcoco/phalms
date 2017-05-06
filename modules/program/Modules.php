<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 18/04/2017
 * Time: 1414:0404:4747
 */

namespace Modules\Program;

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
                "Modules\\Program\\Controllers" => __DIR__."/controllers/",
                "Modules\\Program\\Models"      => __DIR__."/models/",
                "Modules\\Frontend\\Controllers"      => realpath(dirname(__FILE__))."/../frontend/controllers/",
                "Modules\\Donation\\Models"      => realpath(dirname(__FILE__))."/../donation/models/",
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