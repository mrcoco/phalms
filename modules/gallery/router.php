<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 10/01/2017
 * Time: 0909:0101:2727
 */

$router->add('/gallery', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'index'
));

$router->add('/gallery/gallery', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'gallery'
));

$router->add('/gallery/list', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'list'
));

$router->add('/gallery/create', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'create'
));

$router->add('/gallery/edit', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'edit'
));

$router->add('/gallery/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/image', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'image'
));

$router->add('/image/list', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'imagelist'
));

$router->add('/image/create', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'imagecreate'
));

$router->add('/image/edit', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'imageedit'
));

$router->add('/image/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Gallery\Controllers',
    'module'     => 'gallery',
    'controller' => 'gallery',
    'action'     => 'imagedelete',
    'id'         => 1
));
