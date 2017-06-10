<?php
/**
 * Created by Phalms Module Generator.
 *
 * Classroom modules
 *
 * @package Phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:40
 * @license MIT
 */

$router->add('/classroom', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'index'
));

$router->add('/classroom/list', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'list'
));

$router->add('/classroom/create', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'create'
));

$router->add('/classroom/edit', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'edit'
));

$router->add('/classroom/get', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'get'
));

$router->add('/classroom/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/classroom/teacher', array(
    'namespace'  => 'Modules\Classroom\Controllers',
    'module'     => 'classroom',
    'controller' => 'classroom',
    'action'     => 'teacher'
));