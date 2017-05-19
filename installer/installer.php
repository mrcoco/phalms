<?php
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
/**
* 
*/

class Installer 
{
	public $app;

	function __construct()
	{
		$di = new FactoryDefault();
		$this->app = new Micro($di);
		$di->set('view', $this->view());
		$this->error($this->app);
		
	}

	public function run()
	{
		try {
			$this->route($this->app);
			$this->app->handle();
		}catch (Exception $e) {
			echo $e->getMessage(), '<br>';
			echo nl2br(htmlentities($e->getTraceAsString()));
		}
	}

	public function error($app)
	{
		$this->app->notFound(function () use ($app){
	    	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
		    echo 'This is crazy, but this page was not found!';
		});
	}

	public function route($app)
	{
		$this->app->get('/', function() use ($app) {
		    echo $app['view']->render('installer');
		});
		$this->app->get('/installer', function() use ($app) {
		    echo $app['view']->render('installer');
		});
	}

	public function view()
	{
		$view = new \Phalcon\Mvc\View\Simple();
		$view->registerEngines(
		     [
		          ".volt"  => "Phalcon\\Mvc\\View\\Engine\\Volt"
		     ]
		);
	    $view->setViewsDir(BASE_PATH . "/installer/views/");

	    return $view;
	}

	public function configDb($input)
	{
		$adapter = '\Phalcon\Db\Adapter\Pdo\\' . $input["adapter"];
        $connection = new $adapter(
            [
                "host" => $input["host"],
                "port" => $input["port"],
                "username" => $input["username"],
                "password" => $input["password"],
                "dbname" => $input["dbname"],
            ]
        );
        return $connection;
	}
}