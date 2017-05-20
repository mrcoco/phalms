<?php
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use Phalms\Installer\Database;
use Phalms\Installer\Config;
use Phalcon\Db\Index;
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
		$this->app->post('/setup', function() use ($app) {
			try { 
				$db = Database::configDb($app->request->getPost());

			} catch (\Exception $e){ 
				echo json_encode($e->getMessage());
				return; 
			}
			try {
				Config::write($app->request->getPost());
				$migrate = Database::createTable($db);
				echo json_encode($migrate);
				//echo Database::privateResource($db);
				// $db->createTable('email_confirmations', null, array(
	   //              "columns" => Database::emailConfirmations(),
	   //              "indexes" => array(
	   //                  new Index("PRIMARY", array("id"))
	   //              )
	   //          ));

			} catch (\Exception $e) {
				echo json_encode($e->getMessage());
				return; 
			}
			
		    
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

	public function writeConfig()
	{

	}

	public function createTable()
	{

	}


}