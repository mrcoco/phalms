<?php
/**
 * Created by Phalms Module Generator.
 *
 * ClassRoom User Module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    
 * @date:   2017-06-13
 * @time:   11:06:05
 * @license MIT
 */

$router->add('/classroomuser', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'index'
));

$router->add('/classroomuser/list', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'list'
));

$router->add('/classroomuser/create', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'create'
));

$router->add('/classroomuser/edit', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'edit'
));

$router->add('/classroomuser/get', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'get'
));

$router->add('/classroomuser/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Classroomuser\Controllers',
    'module'     => 'classroomuser',
    'controller' => 'classroomuser',
    'action'     => 'delete',
    'id'         => 1
));

