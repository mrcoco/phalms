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

$router->add('/{module_name_l}', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'index'
));

$router->add('/{module_name_l}/list', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'list'
));

$router->add('/{module_name_l}/create', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'create'
));

$router->add('/{module_name_l}/edit', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'edit'
));

$router->add('/{module_name_l}/get', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'get'
));

$router->add('/{module_name_l}/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\{module_name}\Controllers',
    'module'     => '{module_name_l}',
    'controller' => '{module_name_l}',
    'action'     => 'delete',
    'id'         => 1
));

