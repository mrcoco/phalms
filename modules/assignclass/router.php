<?php
/**
 * Created by Phalms Module Generator.
 *
 * assignments Class Room
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:00
 * @license MIT
 */

$router->add('/assignclass', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'index'
));

$router->add('/assignclass/list', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'list'
));

$router->add('/assignclass/create', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'create'
));

$router->add('/assignclass/edit', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'edit'
));

$router->add('/assignclass/get', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'get'
));

$router->add('/assignclass/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Assignclass\Controllers',
    'module'     => 'assignclass',
    'controller' => 'assignclass',
    'action'     => 'delete',
    'id'         => 1
));

