<?php
/**
 * Created by PhpStorm.
 * User: dwiagus
 * Date: 10/6/2016
 * Time: 9:06 PM
 */

namespace Modules\Frontend;
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
                "Modules\\Frontend\\Controllers" => __DIR__."/controllers/",
                "Modules\\Frontend\\Models"      => __DIR__."/models/",
                "Modules\\Banner\\Models"       => realpath(dirname(__FILE__))."/../banner/models/",
                "Modules\\Service\\Models"      => realpath(dirname(__FILE__))."/../service/models/",
                "Modules\\Gallery\\Models"      => realpath(dirname(__FILE__))."/../gallery/models/",
                "Modules\\Cms\\Models"          => realpath(dirname(__FILE__))."/../cms/models/",
                "Modules\\Program\\Models"      => realpath(dirname(__FILE__))."/../program/models/",
                "Modules\\Donation\\Models"      => realpath(dirname(__FILE__))."/../donation/models/",
                "Modules\\User\\Models"      => realpath(dirname(__FILE__))."/../user/models/",
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
        $view->setLayout('public');
    }
}

