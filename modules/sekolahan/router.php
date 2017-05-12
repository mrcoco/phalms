<?php
/**
 * Created by Phalms Module Generator.
 *
 * oh yess
 *
 * @package phalms module
 * @author  dwi agus
 * @link    htp://oye.oye
 * @date:   2017-05-12
 * @time:   13:05:49
 * @license MIT
 */

$router->add('/sekolahan', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'index'
));

$router->add('/sekolahan/list', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'list'
));

$router->add('/sekolahan/create', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'create'
));

$router->add('/sekolahan/edit', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'edit'
));

$router->add('/sekolahan/get', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'get'
));

$router->add('/sekolahan/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Sekolahan\Controllers',
    'module'     => 'sekolahan',
    'controller' => 'sekolahan',
    'action'     => 'delete',
    'id'         => 1
));

