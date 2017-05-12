<?php
/**
 * Created by Phalms Module Generator.
 *
 * oh yess
 *
 * @package phalms module
 * @author  dwi agus
 * @link    htp://oye.oye
 * @date:   2017-05-12
 * @time:   13:05:49
 * @license MIT
 */

namespace Modules\Sekolahan;

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
                "Modules\\Sekolahan\\Controllers" => __DIR__."/controllers/",
                "Modules\\Sekolahan\\Models"      => __DIR__."/models/",
                "Modules\\Sekolahan\\Plugin"      => __DIR__."/plugin/",
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