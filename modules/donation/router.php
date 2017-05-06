<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 20/04/2017
 * Time: 1414:0404:2121
 */

$router->add('/donation', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'index'
));

$router->add('/donation/list', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'list'
));

$router->add('/donation/edit', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'edit'
));

$router->add('/donation/get', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'get'
));

$router->add('/donation/download', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'download'
));

$router->add('/donation/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Donation\Controllers',
    'module'     => 'donation',
    'controller' => 'donation',
    'action'     => 'delete',
    'id'         => 1
));

