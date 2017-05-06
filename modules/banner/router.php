<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 10/01/2017
 * Time: 0909:0101:2727
 */

$router->add('/banner', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'index'
));

$router->add('/banner/list', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'list'
));

$router->add('/banner/create', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'create'
));

$router->add('/banner/edit', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'edit'
));

$router->add('/banner/get', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'get'
));

$router->add('/banner/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Banner\Controllers',
    'module'     => 'banner',
    'controller' => 'banner',
    'action'     => 'delete',
    'id'         => 1
));