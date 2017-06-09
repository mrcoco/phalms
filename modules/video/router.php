<?php
/**
 * Created by Phalms Module Generator.
 *
 * show video on frontend
 *
 * @package phalmsmodule
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-12
 * @time:   16:05:33
 * @license MIT
 */

$router->add('/video', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'index'
));

$router->add('/video/list', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'list'
));

$router->add('/video/create', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'create'
));

$router->add('/video/edit', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'edit'
));

$router->add('/video/get', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'get'
));

$router->add('/video/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Video\Controllers',
    'module'     => 'video',
    'controller' => 'video',
    'action'     => 'delete',
    'id'         => 1
));

