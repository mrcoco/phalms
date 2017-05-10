<?php
/**
 * Created by Phalms Module Generator.
 *
 * Phalms Module manager
 *
 * @package Phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-10
 * @time:   20:05:48
 * @license MIT
 */

$router->add('/modules', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'index'
));

$router->add('/modules/list', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'list'
));

$router->add('/modules/create', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'create'
));

$router->add('/modules/edit', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'edit'
));

$router->add('/modules/get', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'get'
));

$router->add('/modules/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Modules\Controllers',
    'module'     => 'modules',
    'controller' => 'modules',
    'action'     => 'delete',
    'id'         => 1
));

