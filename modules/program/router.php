<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 18/04/2017
 * Time: 1414:0404:4747
 */

$router->add('/program', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'index'
));

$router->add('/program/list', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'list'
));

$router->add('/program/create', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'create'
));

$router->add('/program/edit', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'edit'
));


$router->add('/program/get', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'get'
));

$router->add('/program/location', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'location'
));

$router->add('/program/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'delete',
    'id'         => 1
));

/**  Category $router */
$router->add('/program/category', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'Category',
    'action'     => 'index'
));

/**  Category $router */
$router->add('/program/categories', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'category',
    'action'     => 'all'
));

$router->add('/program/category/list', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'category',
    'action'     => 'list'
));

$router->add('/program/category/create', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'category',
    'action'     => 'create'
));

$router->add('/program/category/edit', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'category',
    'action'     => 'edit'
));

$router->add('/program/category/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'category',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/program/download', array(
    'namespace'  => 'Modules\Program\Controllers',
    'module'     => 'program',
    'controller' => 'program',
    'action'     => 'download'
));