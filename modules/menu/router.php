<?php
/**
 * Created by Phalms Module Generator.
 *
 * menu manager
 *
 * @package phalms module
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-12
 * @time:   15:05:53
 * @license MIT
 */

$router->add('/menu', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'index'
));

$router->add('/menu/list', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'list'
));

$router->add('/menu/create', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'create'
));

$router->add('/menu/edit', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'edit'
));

$router->add('/menu/get', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'get'
));

$router->add('/menu/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Menu\Controllers',
    'module'     => 'menu',
    'controller' => 'menu',
    'action'     => 'delete',
    'id'         => 1
));

