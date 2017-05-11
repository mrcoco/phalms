<?php
/**
 * Created by Phalms Module Generator.
 *
 * phalms module sekolahan
 *
 * @package Phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-11
 * @time:   17:05:38
 * @license MIT
 */

$router->add('/sekolah', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'index'
));

$router->add('/sekolah/list', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'list'
));

$router->add('/sekolah/create', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'create'
));

$router->add('/sekolah/edit', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'edit'
));

$router->add('/sekolah/get', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'get'
));

$router->add('/sekolah/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Sekolah\Controllers',
    'module'     => 'sekolah',
    'controller' => 'sekolah',
    'action'     => 'delete',
    'id'         => 1
));

