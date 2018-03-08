<?php
$router->add('/', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'index'
));
$router->add('/index', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'index'
));

$router->add('/subscribe', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'subscribe'
));
//confirmation
$router->add('/confirmation', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'confirmation'
));

//confirmation
$router->add('/emaildonation', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'emaildonation'
));

$router->add('/alertdonation', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'alertdonation'
));

$router->add('/alertconfirmation', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'alertconfirmation'
));

$router->add('/pages/([a-z0-9\-]+)', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'pages',
    'title'      => 1
));

$router->add('/news/([a-z0-9\-]+)', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'news',
    'title'      => 1
));

$router->add('/story/([a-z0-9\-]+)', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'story',
    'title'      => 1
));

$router->add('/page-cat/([a-z0-9\-]+)', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'pagecat',
    'title'      => 1
));

$router->add('/news-cat/([a-z0-9\-]+)', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'newscat',
    'title'      => 1
));

$router->add('/testing', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'testing',
    'title'      => 1
));