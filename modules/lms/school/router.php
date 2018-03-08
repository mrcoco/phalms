<?php
/**
 * Created by Phalms Module Generator.
 *
 * school name for multi school system
 *
 * @package lms
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   08:06:46
 * @license MIT
 */

$router->add('/school', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'index'
));

$router->add('/school/list', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'list'
));

$router->add('/school/create', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'create'
));

$router->add('/school/edit', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'edit'
));

$router->add('/school/get', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'get'
));

$router->add('/school/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/school/data', array(
    'namespace'  => 'Modules\School\Controllers',
    'module'     => 'school',
    'controller' => 'school',
    'action'     => 'data'
));

