<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router(FALSE);

$router->removeExtraSlashes(true);

$router->add('/confirm/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'confirmEmail'
]);

$router->add('/reset-password/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'resetPassword'
]);

$core_modules   = include APP_PATH . '/config/core.module.php';
$lms_modules    = include APP_PATH . '/config/lms.module.php';
$modules        = include APP_PATH . '/config/modules.php';

foreach ($core_modules as $core){
    if(file_exists(BASE_PATH . '/modules/core/'.$core.'/router.php')){
        require_once BASE_PATH . '/modules/core/'.$core.'/router.php';
    }
}

foreach ($lms_modules as $lms){
    if(file_exists(BASE_PATH . '/modules/lms/'.$lms.'/router.php')){
        require_once BASE_PATH . '/modules/lms/'.$lms.'/router.php';
    }
}

foreach ($modules as $module){
    if(file_exists(BASE_PATH . '/modules/'.$module.'/router.php')){
        require_once BASE_PATH . '/modules/'.$module.'/router.php';
    }
}

$router->notFound(array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'error'
));

return $router;
