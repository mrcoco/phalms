<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2222
 */

$router->add('/service', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'index'
));

$router->add('/service/list', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'list'
));

$router->add('/service/create', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'create'
));

$router->add('/service/edit', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'edit'
));

$router->add('/service/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/service/page', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'page'
));

$router->add('/service/get', array(
    'namespace'  => 'Modules\Service\Controllers',
    'module'     => 'service',
    'controller' => 'service',
    'action'     => 'get'
));