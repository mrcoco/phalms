#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: dwiagus
 * Date: 29/12/16
 * Time: 11:03
 */

define('APP_PATH', realpath('..') . '/app');
define('BASE_PATH', dirname(__DIR__));


use Symfony\Component\Console\Application;
use App\Commands\GenerateModel;
use App\Commands\GenerateDatabase;
use App\Commands\GenerateModule;
use App\Commands\GenerateController;
use App\Commands\GenerateRouter;
use App\Commands\GenerateView;
use App\Commands\DropModule;

require_once BASE_PATH . '/vendor/autoload.php';

$application = new Application();
$application->add(new GenerateModule());
$application->add(new GenerateModel());
$application->add(new GenerateDatabase());
$application->add(new GenerateController());
$application->add(new GenerateView());
$application->add(new GenerateRouter());
$application->add(new DropModule());
try {

    $application->run();

} catch(\Exception $e) {

    echo $e->getMessage();
    exit(255);
}

