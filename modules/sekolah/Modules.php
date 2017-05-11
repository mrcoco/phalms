<?php
/**
 * Created by Phalms Module Generator.
 *
 * phalms module sekolahan
 *
 * @package Phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-11
 * @time:   17:05:38
 * @license MIT
 */

namespace Modules\Sekolah;

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
                "Modules\\Sekolah\\Controllers" => __DIR__."/controllers/",
                "Modules\\Sekolah\\Models"      => __DIR__."/models/",
                "Modules\\Sekolah\\Plugin"      => __DIR__."/plugin/",
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