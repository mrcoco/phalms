<?php
/**
 * Created by Phalms Module Generator.
 *
 * paijo
 *
 * @package paijo
 * @author  paijojo
 * @link    paijoweb
 * @date:   2017-05-10
 * @time:   18:05:43
 * @license MIT
 */

$router->add('/paijo', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'index'
));

$router->add('/paijo/list', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'list'
));

$router->add('/paijo/create', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'create'
));

$router->add('/paijo/edit', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'edit'
));

$router->add('/paijo/get', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'get'
));

$router->add('/paijo/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'delete',
    'id'         => 1
));

