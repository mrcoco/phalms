<?php
namespace Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Vokuro\Sosial\Sosial;
use Vokuro\Widget\Widget;

/**
 * ControllerBase
 * This is the base controller for all controllers in the application
 */
class ControllerBase extends Controller
{
    public function initialize()
    {
//        $sosial = new Sosial();
//        $widget = new Widget();
//        $show   = $widget->show();
//        $this->view->banner     = $show['banner'];
//        $this->view->service    = $show['service'];
//        $this->view->news       = $show['news'];
//        $this->view->story      = $show['story'];
//        $this->view->program    = $show['program'];
//        $this->view->image      = $show['image'];
//        $this->view->instagram  = $sosial->insta();
//        $this->view->pagecat    = $show['pagecat'];
    }
    /**
     * Execute before the router so we can determine if this is a private controller, and must be authenticated, or a
     * public controller that is open to all.
     *
     * @param Dispatcher $dispatcher
     * @return boolean
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();

        // Only check permissions on private controllers
        if ($this->acl->isPrivate($controllerName)) {

            // Get the current identity
            $identity = $this->auth->getIdentity();

            // If there is no identity available the user is redirected to index/index
            if (!is_array($identity)) {

                $this->flash->notice('You don\'t have access to this module: private');

                $dispatcher->forward([
                    'namespace' => 'Modules\Frontend\Controllers',
                    'controller' => 'index',
                    'action' => 'error',
                ]);
                return false;
            }

            // Check if the user have permission to the current option
            $actionName = $dispatcher->getActionName();
            if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {

                $this->flash->notice('You don\'t have access to this module: ' . $controllerName . ':' . $actionName);

                if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
                    $dispatcher->forward([
                        'namespace' => 'Modules\Frontend\Controllers',
                        'controller' => $controllerName,
                        'action' => 'error'
                    ]);
                } else {
                    $dispatcher->forward([
                        'namespace' => 'Modules\Frontend\Controllers',
                        'controller' => 'index',
                        'action' => 'error'
                    ]);
                }

                return false;
            }
        }
    }
}
