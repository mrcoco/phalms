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
use Vokuro\Mail\Mail;
use Vokuro\Widget\Widget;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->pick("index");
    }

    public function confirmationAction()
    {
        if ($this->request->isPost()) {
            $email  = $this->request->getPost('email', 'email');
            $donation = Donation::findFirst([
                "email = '{$email}' AND confirmation = '0' ",
            ]);
            if(! $donation){
                $this->flash->error("Donation not exist");
            }else{
                $donation->bank_name    = $this->request->getPost('bank_name');
                $donation->bank_account = $this->request->getPost('bank_account');
                $donation->confirmation = "1";
                if(! $donation->update()){
                    $msg = "";
                    foreach($donation->getMessages() as $message)
                    {
                        $msg .= $message ." ";
                    }
                    $this->flash->error($msg);
                }else{
                    $this->flash->success("");
                }
            }
        }
        $this->view->pick("confirmation");
    }

    public function programAction()
    {
        $this->view->pick("program");
    }

    public function subscribeAction()
    {
        if ($this->request->isPost()) {
            $mail = new Subscribe();
            $mail->email = $this->request->getPost('email', 'email');
            $mail->status = 1;
            if (!$mail->save()) {
                $msg = "";
                foreach($mail->getMessages() as $message)
                {
                    $msg .= $message ." ";
                }
                $this->flash->error($msg);
            }
        }
        $this->view->pick("subscribe");
    }

    public function getprogramAction()
    {
        $title = Tag::friendlyTitle($this->dispatcher->getParam("title"));
        $program = Program::findFirst(
            [
                "status = '1' AND slug='{$title}' ",
            ]
        );
        if(!$program){
            $this->flash->error("program not found");
        }

        if ($this->request->isPost()) {
            $min    = 1;
            $max    = 900;
            $rand   = rand($min,$max);
            $total  = $this->request->getPost("donation","int")+$rand;
            $donation = new Donation();
            $donation->name     = $this->request->getPost('name');
            $donation->email    = $this->request->getPost('email', 'email');
            $donation->phone    = $this->request->getPost('phone');
            $donation->address  = $this->request->getPost("address");
            $donation->bank_dest= $this->request->getPost("bank_dest");
            $donation->donation = $total;
            $donation->confirmation = "0";
            $donation->approve      = "0";
            $donation->program_id   = $program->id;
            if (!$donation->save()) {
                $msg = "";
                foreach($donation->getMessages() as $message)
                {
                    $msg .= $message ." ";
                }
                $this->flash->error($msg);
            }
            $options = array(
                'cluster' => 'ap1',
                'encrypted' => true
            );

            $pusher = new \Pusher(
                '8e9e51055c3857364c1e',
                '2af6219cf080b8b794e1',
                '333010',
                $options
            );

            $data['message'] = $program->title;
            $data['title']  = "New Donation";
            $pusher->trigger('my-channel', 'my-event', $data);
            $success = "<p><b>".$this->request->getPost('name')."</b>, terima kasih atas donasi Anda untuk program ".$program->title.".
                    <br />
                    Mohon segera transfer dalam waktu 2x 24jam<br />
                    
                    <br>
                    Lakukan Transfer sebesar:<br />
                    <b>Rp ".number_format($total,2,',','.')."</b><br>
                    Tepat hingga 3 digit terakhir<br>
                    (perbedaan nilai transfer akan menghambat proses verifikasi donasi)<br>
                    Ke:<br>
                    {{ bank_dest }}<br>
                    Cabang xxx<br>
                    No Rek. xxx<br>
                    a.n xx<br>
                    Donasi Anda akan terverifikasi oleh sistem dalam 1 hari kerja*.<br>
                    Bila hingga 2x 24jam donasi belum kami terima, maka donasi akan dibatalkan oleh sistem.<br>
                    *Apabila transfer di luar jam kerja bank atau pada hari libur, maka verifikasi donasi akan mengalami keterlambatan.<br>
                    Jika butuh bantuan, hubungi saya dengan membalas email ini atau telepon ke xxx.
                    </p>";
            $this->flash->success($success);
            /**
            $mail = new Mail();
            $mail->sendDonation([
                $this->request->getPost('email', 'email') => $this->request->getPost('email', 'email')
            ], "Zakat for Life - Donation Transfer", 'email', [
                'name'      => $this->request->getPost('name'),
                'donation'  => "Rp " . number_format($total,2,',','.'),
                'bank_dest' => $this->request->getPost("bank_dest"),
                'program'   => $program->title,
            ]);
            **/
        }

        $widget = new Widget();
        $data = (object) array(
            'title'     => $program->title,
            'content'   => $program->content,
            'image'     => $program->image,
            'periode'   => $widget->getMonth($program->start_date,$program->end_date),
            'count_day' => $widget->countDay($program->start_date,$program->end_date),
            'expired'   => $widget->futureDate($program->end_date),
            'remaining' => $widget->remaining($program->start_date,$program->end_date),
            'start'     => $program->start_date,
            'end'       => $program->end_date,
            'benefit'   => $program->benefit,
            'location'  => $program->locations->name,
            'requirement'   => "Rp " . number_format($program->requirement,2,',','.'),
            'percentage'    => ($widget->percentage($program->id)>100) ? "100" : $widget->percentage($program->id),
            "achievements"  => "Rp " . number_format($widget->achievements($program->id),2,',','.'),
        );
        $this->view->setVar("data",$data);
        $this->view->pick("getprogram");
    }

    public function emaildonationAction()
    {
        $this->view->pick("email");
    }

    public function alertdonationAction()
    {
        $this->view->disable();
        $donation = Donation::find(
            "confirmation='0' AND approve='0'"
        );
        $result = array();
        foreach ($donation as $item){
            $result[] = array(
                "name"    => $item->name,
                "program"   => $item->Program->title
            );
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('count' => $donation->count(),'result' => $result ));
        return $response->send();
    }

    public function alertconfirmationAction()
    {
        $this->view->disable();
        $donation = Donation::find(
            "confirmation='1' AND approve <>'1'"
        );
        $result = array();
        foreach ($donation as $item){
            $result[] = array(
                "name"    => $item->name,
                "program"   => $item->Program->title
            );
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('count' => $donation->count(),'result' => $result ));
        return $response->send();
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

    public function newsAction()
    {
        $slug   = $this->dispatcher->getParam("title");
        $news   = $this->blog($slug,"1");
        $this->view->news = $news;
        $this->view->category = BlogCategory::find();
        $this->view->pick("news");
    }

    public function storyAction()
    {
        $slug   = $this->dispatcher->getParam("title");
        $story  = $this->blog($slug,"2");
        $this->view->story = $story;
        $this->view->category = BlogCategory::find();
        $this->view->pick("story");
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