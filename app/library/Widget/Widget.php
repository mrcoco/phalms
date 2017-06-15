<?php
/**
 * Created by PhpStorm.
 * User: kepegawaian
 * Date: 4/25/2017
 * Time: 11:52 PM
 */

namespace Phalms\Widget;
use Modules\Banner\Models\Banner;
use Modules\Cms\Models\Blog;
use Modules\Cms\Models\PageCategory;
use Modules\Gallery\Models\Image;
use Modules\Modules\Models\Modules;
use Modules\Menu\Models\Menu;
use Phalms\Sosial\Sosial;
use \Phalcon\Tag;

class Widget extends \Phalcon\Mvc\User\Component
{
    public function image()
    {
        return Image::find([
            "limit" => 10,
        ]);
    }

    public function frontMenu()
    {
        return Menu::find();
    }

    public function pagecat()
    {
        return PageCategory::find([
            "limit" => 10,
        ]);
    }

    public function banner($limit = 3)
    {
        return Banner::find([
            "limit" => $limit,
        ]);
    }

    public function blog($cat)
    {
        $news = Blog::find(
            [
                "categories_id = '{$cat}' AND publish='1'",
                "order" => "id",
                "limit" => 10,
            ]);
        $result = array();
        if($news->count() >0 ){
            foreach ($news as $item)
            {
                $result[] = (object)array(
                    "title"     => $item->title,
                    "content"   => $item->content,
                    "intro"     => $this->textPad($item->content,"100"),
                    "slug"      => $item->slug,
                    "users"     => $item->Users->name,
                    "date"      => date("d",strtotime($item->created)),
                    "month"     => date("M",strtotime($item->created)),
                );
            }
        }
        return $result;
    }

    public function AddonMenu()
    {
        $modules = Modules::find(["publish='1' AND is_core='0'"]);
        $result = array();
        if($modules->count() > 0){
            foreach ($modules as $item) {
                $result[] = (object) array('name' => ucfirst($item->name), 'slug' => $item->name);
            }
        }
        return $result;
    }


    public function instagram()
    {
        $sosial = new Sosial();
        return $sosial->instagram();
    }

    public function getMonth($start,$end)
    {
        $d1 = new \DateTime($start);
        $d2 = new \DateTime($end);
        $months = 0;

        $d1->add(new \DateInterval('P1M'));
        while ($d1 <= $d2){
            $months ++;
            $d1->add(new \DateInterval('P1M'));
        }

        return count($months);
    }

    
    public function textPad($text, $limit)
    {
        if( strlen($text)>$limit )
        {
            $text = substr( $text,0,$limit );
            $text = substr( $text,0,-(strlen(strrchr($text,' '))) ); $text="$text";
        }

        return $text;
    }
}