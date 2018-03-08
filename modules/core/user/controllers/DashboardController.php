<?php

namespace Modules\User\Controllers;
use Modules\Frontend\Controllers\ControllerBase;

class DashboardController extends ControllerBase
{
	public function initialize()
    {
        $this->view->setTemplateBefore('private');
    }

	public function indexAction()
	{
		//echo "<pre>";
		//print_r($this->config);
		//print_r($this->router);
		//echo "</pre>";
	}
}