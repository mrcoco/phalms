<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: 08/05/2017
 * Time: 2020:0505:5454
 */

$router->add('/generator', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'index'
));

$router->add('/generator/list', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'list'
));

$router->add('/generator/create', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'create'
));

$router->add('/generator/edit', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'edit'
));

$router->add('/generator/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'delete',
    'id'         => 1
));

$router->add('/generator/submit', array(
    'namespace'  => 'Modules\Generator\Controllers',
    'module'     => 'generator',
    'controller' => 'generator',
    'action'     => 'submit'
));

