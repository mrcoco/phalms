<?php
/**
 * Created by Phalms Module Generator.
 *
 * zfl webconfig
 *
 * @package zfl
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-08
 * @time:   11:06:32
 * @license MIT
 */

namespace Modules\Webconfig;

use Phalcon\Loader;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
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
                "Modules\\Webconfig\\Controllers" => __DIR__."/controllers/",
                "Modules\\Webconfig\\Models"      => __DIR__."/models/",
                "Modules\\Webconfig\\Plugin"      => __DIR__."/plugin/",
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