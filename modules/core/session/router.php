<?php
/**
 * Created by Phalms-Cli
 * User: dwiagus
 * Date: 13/04/2017
 * Time: 1616:0404:2222
 */

$router->add('/session/login', array(
    'namespace'  => 'Modules\Session\Controllers',
    'module'     => 'session',
    'controller' => 'session',
    'action'     => 'login'
));

$router->add('/session/logout', array(
    'namespace'  => 'Modules\Session\Controllers',
    'module'     => 'session',
    'controller' => 'session',
    'action'     => 'logout'
));

$router->add('/session/signup', array(
    'namespace'  => 'Modules\Session\Controllers',
    'module'     => 'session',
    'controller' => 'session',
    'action'     => 'signup'
));

$router->add('/session/forgotPassword', array(
    'namespace'  => 'Modules\Session\Controllers',
    'module'     => 'session',
    'controller' => 'session',
    'action'     => 'forgotPassword'
));