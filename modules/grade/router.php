<?php
/**
 * Created by Phalms Module Generator.
 *
 * school grade module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   14:06:25
 * @license MIT
 */

$router->add('/grade', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'index'
));

$router->add('/grade/list', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'list'
));

$router->add('/grade/create', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'create'
));

$router->add('/grade/edit', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'edit'
));

$router->add('/grade/get', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'get'
));

$router->add('/grade/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/grade/data', array(
    'namespace'  => 'Modules\Grade\Controllers',
    'module'     => 'grade',
    'controller' => 'grade',
    'action'     => 'data'
));
