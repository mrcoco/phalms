<?php
/**
 * Created by Phalms Module Generator.
 *
 * Discussions Module
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:54
 * @license MIT
 */

$router->add('/discussions', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'index'
));

$router->add('/discussions/list', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'list'
));

$router->add('/discussions/create', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'create'
));

$router->add('/discussions/edit', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'edit'
));

$router->add('/discussions/get', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'get'
));

$router->add('/discussions/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Discussions\Controllers',
    'module'     => 'discussions',
    'controller' => 'discussions',
    'action'     => 'delete',
    'id'         => 1
));

