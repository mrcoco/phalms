<?php
/**
 * Created by Phalms Module Generator.
 *
 * Submissions Module
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:27
 * @license MIT
 */

$router->add('/submissions', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'index'
));

$router->add('/submissions/list', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'list'
));

$router->add('/submissions/create', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'create'
));

$router->add('/submissions/edit', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'edit'
));

$router->add('/submissions/get', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'get'
));

$router->add('/submissions/delete/{id:[0-9]+}', array(
    'namespace'  => 'Modules\Submissions\Controllers',
    'module'     => 'submissions',
    'controller' => 'submissions',
    'action'     => 'delete',
    'id'         => 1
));

