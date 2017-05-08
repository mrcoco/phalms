<?php
/**
 * Created by PhpStorm.
 * User: dwiagus
 * Date: 4/25/17
 * Time: 3:28 PM
 */

namespace Phalms\Sosial;
use Phalcon\Mvc\User\Component;
use InstagramScraper\Instagram;

class Sosial extends Component
{
    public function scrape_insta_hash($tag){
        $insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
        $shards = explode('window._sharedData = ', $insta_source);
        $insta_json = explode(';</script>', $shards[1]);
        $insta_array = json_decode($insta_json[0], TRUE);
        return $insta_array; // this return a lot things print it and see what else you need
    }

    public function insta(){
        $tag = 'zakatforlife'; // tag for which ou want images
        $results_array = $this->scrape_insta_hash($tag);
        $limit = 12; // provide the limit thats important because one page only give some images then load more have to be clicked
        $image_array= array(); // array to store images.
        for ($i=0; $i < $limit; $i++) {
            $latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
            $image_data  = '<li><img width="75px" src="'.$latest_array['thumbnail_src'].'"></li>'; // thumbnail and same sizes
            //$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes
            array_push($image_array, $image_data);
        }
        return $image_array;
    }

    public function instagram()
    {
        $medias = Instagram::getMedias('zakatforlife', 12);
        $result = array();
//        foreach ($medias as $item){
//            $li = "<li><img width='75px' height='75px' src='".$item->imageThumbnailUrl."'></li>";
//            array_push($result,$li);
//        }
        return $medias;
    }
}