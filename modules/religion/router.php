<?php
/**
 * Created by Phalms Module Generator.
 *
 * Religion module
 *
 * @package phalms
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-12
 * @time:   12:06:11
 * @license MIT
 */

$router->add('/religion', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'index'
));

$router->add('/religion/list', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'list'
));

$router->add('/religion/create', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'create'
));

$router->add('/religion/edit', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'edit'
));

$router->add('/religion/get', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'get'
));

$router->add('/religion/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Religion\Controllers',
    'module'     => 'religion',
    'controller' => 'religion',
    'action'     => 'delete',
    'id'         => 1
));

