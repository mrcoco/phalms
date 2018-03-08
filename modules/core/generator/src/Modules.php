<?php
/**
 * Created by Phalms Module Generator.
 *
 * {description}
 *
 * @package {package}
 * @author  {author}
 * @link    {website}
 * @date:   {date}
 * @time:   {time}
 * @license {copyright}
 */

namespace Modules\{module_name};

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
        $config = $di->get('config');
        $loader->registerNamespaces(
            [
                "Modules\\{module_name}\\Controllers" => __DIR__."/controllers/",
                "Modules\\{module_name}\\Models"      => __DIR__."/models/",
                "Modules\\{module_name}\\Plugin"      => __DIR__."/plugin/",
                "Modules\\Frontend\\Controllers"      => $config->modules->core."/frontend/controllers/",
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