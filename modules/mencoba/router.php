<?php
/**
 * Created by Phalms Module Generator.
 *
 * mencoba
 *
 * @package 
 * @author  
 * @link    
 * @date:   2018-03-06
 * @time:   17:03:44
 * @license MIT
 */

$router->add('/mencoba', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'index'
));

$router->add('/mencoba/list', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'list'
));

$router->add('/mencoba/create', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'create'
));

$router->add('/mencoba/edit', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'edit'
));

$router->add('/mencoba/get', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'get'
));

$router->add('/mencoba/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Mencoba\Controllers',
    'module'     => 'mencoba',
    'controller' => 'mencoba',
    'action'     => 'delete',
    'id'         => 1
));

