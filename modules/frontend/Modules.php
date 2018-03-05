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
                "Modules\\User\\Models"      => realpath(dirname(__FILE__))."/../user/models/",
                "Modules\\Menu\\Models"      => realpath(dirname(__FILE__))."/../menu/models/",
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
        $view->setPartialsDir($config->application->partialDir );
        $view->setLayout('public');
    }
}

