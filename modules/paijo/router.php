<?php
/**
 * Created by Phalms Module Generator.
 *
 * oyess
 *
 * @package phalms-module
 * @author  paijo
 * @link    http://cempakaweb.com
 * @date:   2017-05-10
 * @time:   16:05:12
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

$router->add('/paijo/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Paijo\Controllers',
    'module'     => 'paijo',
    'controller' => 'paijo',
    'action'     => 'delete',
    'id'         => 1
));

