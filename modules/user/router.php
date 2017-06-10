<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2222
 */

$router->add('/users', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'index'
));

$router->add('/users/list', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'list'
));

$router->add('/users/get', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'get'
));

$router->add('/users/create', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'create'
));

$router->add('/users/edit', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'edit',
));

$router->add('/users/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/users/changePassword', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'users',
    'action'     => 'changePassword'
));

/**
 * Profiles Route
 */

$router->add('/profiles', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'index'
));

$router->add('/profiles/search', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'search'
));

$router->add('/profiles/create', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'create'
));

$router->add('/profiles/edit/{id:[0-9]+}', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'edit',
    'id'         => 1
));

$router->add('/profiles/list', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'list'
));

$router->add('/profiles/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'profiles',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/permissions', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'permissions',
    'action'     => 'index'
));

$router->add('/dashboard', array(
    'namespace'  => 'Modules\User\Controllers',
    'module'     => 'user',
    'controller' => 'dashboard',
    'action'     => 'index'
));