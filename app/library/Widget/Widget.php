<?php
/**
 * Created by PhpStorm.
 * User: kepegawaian
 * Date: 4/25/2017
 * Time: 11:52 PM
 */

namespace Vokuro\Widget;
use Modules\Banner\Models\Banner;
use Modules\Cms\Models\Blog;
use Modules\Cms\Models\PageCategory;
use Modules\Donation\Models\Donation;
use Modules\Gallery\Models\Image;
use Modules\Service\Models\Service;
use Modules\Program\Models\Program;
use Vokuro\Sosial\Sosial;
use \Phalcon\Tag;

class Widget extends \Phalcon\Mvc\User\Component
{
    public function image()
    {
        return Image::find([
            "limit" => 10,
        ]);
    }

    public function pagecat()
    {
        return PageCategory::find([
            "limit" => 10,
        ]);
    }

    public function banner()
    {
        return Banner::find([
            "limit" => 3,
        ]);
    }

    public function service()
    {
        return Service::find([
            "limit" => 8,
        ]);
    }

    public function news()
    {
        $news = Blog::find(
            [
                "categories_id = '1' AND publish='1'",
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

    public function story()
    {
        $story = Blog::find([
            "categories_id = '2' AND publish='1'",
            "order" => "id",
            "limit" => 10,
        ]);

        $result = array();
        if($story->count() >0 ){
            foreach( $story as $item)
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

    public function program()
    {
        $program = Program::find([
            "order" => "id DESC",
            "limit" => 4,]);
        $result = array();
        foreach ($program as $item)
        {
            $result[] = (object) array(
                "id"        => $item->id,
                "slug"      => Tag::friendlyTitle($item->title),
                "periode"   => $this->getMonth($item->start_date,$item->end_date),
                "start_day" => date("d",strtotime($item->start_date)),
                "start_mon" => date("M", strtotime($item->start_date)),
                "start_date"=> $item->start_date,
                "title"     => $item->title,
                "content"   => $item->content,
                "intro"     => substr($item->content,0,100),
                "image"     => $item->image,
                "category"  => $item->category,
                "locations"  => $item->locations,
                "benefit"   => $item->benefit,
                "percentage"=> ($this->percentage($item->id) > "100") ? "100" : $this->percentage($item->id),
                "achievements" => "Rp " . number_format($this->achievements($item->id),2,',','.'),
            );
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

    public function countDay($start,$end)
    {
        $datetime1 = new \DateTime($start);
        $datetime2 = new \DateTime($end);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');;
    }

    public function futureDate($end)
    {
        $d = new \DateTime($end);
        return $d->diff(new \DateTime())->format('%a');
    }

    public function achievements($id)
    {
        $total = Donation::sum([
            "column"     => "donation",
            "conditions" => "program_id = '{$id}' AND approve=1"
        ]);
        return $total;
    }

    public function percentage($id)
    {
        $program    = Program::findFirst($id);
        $total      = $program->requirement;
        $sum        = $this->achievements($id);
        $percentage = round($sum/$total * 100,2);
        return $percentage;
    }

    public function remaining($start,$end)
    {
        $total  = $this->countDay($start,$end);
        $sum    = $total-$this->futureDate($end);
        $percentage = round($sum/$total * 100,2);
        return $percentage;
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