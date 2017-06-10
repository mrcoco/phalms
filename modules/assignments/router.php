<?php
/**
 * Created by Phalms Module Generator.
 *
 * Assignments Module 
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:42
 * @license MIT
 */

$router->add('/assignments', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'index'
));

$router->add('/assignments/list', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'list'
));

$router->add('/assignments/create', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'create'
));

$router->add('/assignments/edit', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'edit'
));

$router->add('/assignments/get', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'get'
));

$router->add('/assignments/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Assignments\Controllers',
    'module'     => 'assignments',
    'controller' => 'assignments',
    'action'     => 'delete',
    'id'         => 1
));

