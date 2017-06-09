<?php
/**
 * Created by Phalms Module Generator.
 *
 * email send
 *
 * @package 
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-30
 * @time:   09:05:13
 * @license MIT
 */

namespace Modules\Massmail;

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
                "Modules\\Massmail\\Controllers" => __DIR__."/controllers/",
                "Modules\\Massmail\\Models"      => __DIR__."/models/",
                "Modules\\Massmail\\Plugin"      => __DIR__."/plugin/",
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