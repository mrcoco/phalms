<?php
/**
 * Created by Vokuro-Cli
 * User: dwiagus
 * Date: !date
 * Time: !time
 */

$router->add('/?module/?action', array(
    'namespace'  => 'Modules\!module\Controllers',
    'module'     => '?module',
    'controller' => '?module',
    'action'     => '?action'
));

