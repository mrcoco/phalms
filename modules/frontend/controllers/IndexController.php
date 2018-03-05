<?php
/**
 * Created by PhpStorm.
 * User: DwiAgus
 * Date: 10/25/2016
 * Time: 11:29 AM
 */

namespace Modules\Frontend\Controllers;
use Modules\Cms\Models\Blog;
use Modules\Cms\Models\BlogCategory;
use Modules\Cms\Models\Page;
use Modules\Cms\Models\PageCategory;
use Modules\Donation\Models\Donation;
use Modules\Frontend\Models\Subscribe;
use Modules\Program\Models\Program;
use Phalcon\Tag;
use Phalms\Mail\Mail;
use Phalms\Widget;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->pick("index");
    }

    public function errorAction()
    {
        $this->view->pick("error");
    }

    public function pagesAction()
    {
        $title = $this->dispatcher->getParam("title");
        $page = Page::findFirst(
            [
                "publish = '1' AND slug='{$title}' ",
            ]
        );
        if(!$page){
            $this->flash->error("page not found");
        }
        $this->view->category = PageCategory::find();
        $this->view->page = $page;
        $this->view->pick("page");
    }


    public function blog($slug,$cat)
    {
        $blog = Blog::findFirst([
            "slug='{$slug}' AND categories_id = '{$cat}'",
        ]);
        return $blog;
    }

    public function pagecatAction()
    {
        $slug   = $this->dispatcher->getParam("title");
        $cat = PageCategory::findFirst([
            "slug='{$slug}'",
        ]);
        $result = array();
        $widget = new Widget();
        if($cat->Page->count() >0 ){
            foreach( $cat->Page as $item)
            {
                $result[] = (object)array(
                    "title"     => $item->title,
                    "content"   => $item->content,
                    "intro"     => $widget->textPad($item->content,"100"),
                    "slug"      => $item->slug,
                    "users"     => $item->Users->name,
                    "date"      => date("d",strtotime($item->created)),
                    "month"     => date("M",strtotime($item->created)),
                );
            }
        }
        $this->view->name   = $cat->name;
        $this->view->slug   = $cat->slug;
        $this->view->category = $result;
        $this->view->pick("category");
    }

    public function newscatAction()
    {
        $slug   = $this->dispatcher->getParam("title");
        $cat = BlogCategory::findFirst([
            "slug='{$slug}'",
        ]);
        $result = array();
        $widget = new Widget();
        if($cat->Blog->count() >0 ){
            foreach( $cat->Blog as $item)
            {
                $result[] = (object)array(
                    "title"     => $item->title,
                    "content"   => $item->content,
                    "intro"     => $widget->textPad($item->content,"100"),
                    "slug"      => $item->slug,
                    "users"     => $item->Users->name,
                    "date"      => date("d",strtotime($item->created)),
                    "month"     => date("M",strtotime($item->created)),
                );
            }
        }
        $this->view->name   = $cat->name;
        $this->view->slug   = $cat->slug;
        $this->view->c_slug = $slug;
        $this->view->category = $result;
        $this->view->pick("news-category");
    }
}