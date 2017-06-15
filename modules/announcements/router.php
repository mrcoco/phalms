<?php
/**
 * Created by Phalms Module Generator.
 *
 * announcements module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-15
 * @time:   09:06:59
 * @license MIT
 */

$router->add('/announcements', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'index'
));

$router->add('/announcements/list', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'list'
));

$router->add('/announcements/create', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'create'
));

$router->add('/announcements/edit', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'edit'
));

$router->add('/announcements/get', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'get'
));

$router->add('/announcements/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Announcements\Controllers',
    'module'     => 'announcements',
    'controller' => 'announcements',
    'action'     => 'delete',
    'id'         => 1
));

