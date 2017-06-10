<?php
/**
 * Created by Phalms Module Generator.
 *
 * course module managemen
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:11
 * @license MIT
 */

$router->add('/course', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'index'
));

$router->add('/course/list', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'list'
));

$router->add('/course/create', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'create'
));

$router->add('/course/edit', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'edit'
));

$router->add('/course/get', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'get'
));

$router->add('/course/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Course\Controllers',
    'module'     => 'course',
    'controller' => 'course',
    'action'     => 'delete',
    'id'         => 1
));

