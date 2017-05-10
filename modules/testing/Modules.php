<?php
/**
 * Created by Phalms Module Generator.
 *
 * testing
 *
 * @package testing
 * @author  testing
 * @link    http://cempakaweb.com
 * @date:   2017-05-10
 * @time:   16:05:20
 * @license MIT
 */

namespace Modules\Testing;

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
                "Modules\\Testing\\Controllers" => __DIR__."/controllers/",
                "Modules\\Testing\\Models"      => __DIR__."/models/",
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