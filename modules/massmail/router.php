<?php
/**
 * Created by Phalms Module Generator.
 *
 * email send
 *
 * @package 
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-30
 * @time:   09:05:13
 * @license MIT
 */

$router->add('/massmail', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'index'
));

$router->add('/massmail/list', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'list'
));

$router->add('/massmail/create', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'create'
));

$router->add('/massmail/edit', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'edit'
));

$router->add('/massmail/get', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'get'
));

$router->add('/massmail/send', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'send'
));

$router->add('/massmail/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Massmail\Controllers',
    'module'     => 'massmail',
    'controller' => 'massmail',
    'action'     => 'delete',
    'id'         => 1
));

