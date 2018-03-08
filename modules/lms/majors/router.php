<?php
/**
 * Created by Phalms Module Generator.
 *
 * Majors name
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:55
 * @license MIT
 */

$router->add('/majors', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'index'
));

$router->add('/majors/list', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'list'
));

$router->add('/majors/create', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'create'
));

$router->add('/majors/edit', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'edit'
));

$router->add('/majors/get', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'get'
));

$router->add('/majors/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/majors/data', array(
    'namespace'  => 'Modules\Majors\Controllers',
    'module'     => 'majors',
    'controller' => 'majors',
    'action'     => 'data'
));
