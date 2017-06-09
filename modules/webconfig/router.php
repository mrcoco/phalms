<?php
/**
 * Created by Phalms Module Generator.
 *
 * zfl webconfig
 *
 * @package zfl
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-08
 * @time:   11:06:32
 * @license MIT
 */

$router->add('/webconfig', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'index'
));

$router->add('/webconfig/list', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'list'
));

$router->add('/webconfig/create', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'create'
));

$router->add('/webconfig/edit', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'edit'
));

$router->add('/webconfig/get', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'get'
));

$router->add('/webconfig/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Webconfig\Controllers',
    'module'     => 'webconfig',
    'controller' => 'webconfig',
    'action'     => 'delete',
    'id'         => 1
));

