<?php
/**
 * Created by Phalms Module Generator.
 *
 * Subject modules
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:58
 * @license MIT
 */

$router->add('/subject', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'index'
));

$router->add('/subject/list', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'list'
));

$router->add('/subject/create', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'create'
));

$router->add('/subject/edit', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'edit'
));

$router->add('/subject/get', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'get'
));

$router->add('/subject/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Subject\Controllers',
    'module'     => 'subject',
    'controller' => 'subject',
    'action'     => 'delete',
    'id'         => 1
));

