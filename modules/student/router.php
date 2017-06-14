<?php
/**
 * Created by Phalms Module Generator.
 *
 * Student module 
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-14
 * @time:   14:06:05
 * @license MIT
 */

$router->add('/student', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'index'
));

$router->add('/student/list', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'list'
));

$router->add('/student/create', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'create'
));

$router->add('/student/edit', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'edit'
));

$router->add('/student/get', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'get'
));

$router->add('/student/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Student\Controllers',
    'module'     => 'student',
    'controller' => 'student',
    'action'     => 'delete',
    'id'         => 1
));

