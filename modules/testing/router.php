<?php
/**
 * Created by Phalms Module Generator.
 *
 * testing
 *
 * @package testing
 * @author  testing
 * @link    http://cempakaweb.com
 * @date:   2017-05-10
 * @time:   16:05:20
 * @license MIT
 */

$router->add('/testing', array(
    'namespace'  => 'Modules\Testing\Controllers',
    'module'     => 'testing',
    'controller' => 'testing',
    'action'     => 'index'
));

$router->add('/testing/list', array(
    'namespace'  => 'Modules\Testing\Controllers',
    'module'     => 'testing',
    'controller' => 'testing',
    'action'     => 'list'
));

$router->add('/testing/create', array(
    'namespace'  => 'Modules\Testing\Controllers',
    'module'     => 'testing',
    'controller' => 'testing',
    'action'     => 'create'
));

$router->add('/testing/edit', array(
    'namespace'  => 'Modules\Testing\Controllers',
    'module'     => 'testing',
    'controller' => 'testing',
    'action'     => 'edit'
));

$router->add('/testing/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Testing\Controllers',
    'module'     => 'testing',
    'controller' => 'testing',
    'action'     => 'delete',
    'id'         => 1
));

