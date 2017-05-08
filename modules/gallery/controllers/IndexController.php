<?php
/**
 * Created by PhpStorm.
 * User: DwiAgus
 * Date: 10/31/2016
 * Time: 08:37 AM
 */

namespace modules\gallery\controllers;


use Modules\Gallery\Models\Gallery;
use Modules\Gallery\Models\Image;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalms\Models\Views;
use Phalms\Models\Pages;

class IndexController extends \Phalms\Controllers\BaseController
{
    public function initialize() {
        $this->tag->setTitle('Manage your Companies');
        $this->view->setTemplateBefore('public');
        $this->view->setVar('popular', Views::find(['order' => 'views DESC', 'limit' => 5]));
        $this->view->setVar('latest',Pages::find(['order' => 'id DESC', 'limit' => 5]));
        parent::initialize();
    }

    public function indexAction()
    {
        $image = Image::find(['order' => 'id DESC']);
        $numberPage = $this->request->getQuery("p", "int");
        $paginator = new Paginator(array(
            "data"  => $image,
            "limit" => 6,
            "page"  => $numberPage,
            'url'   => "",
        ));
        $this->view->url ="";
        $this->view->gallery = Gallery::find();
        $this->view->image = $paginator->getPaginate();
    }
}