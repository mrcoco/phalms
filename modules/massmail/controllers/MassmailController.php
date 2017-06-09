<?php
/**
 * Created by Phalms Module Generator.
 *
 * email send
 *
 * @package 
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-30
 * @time:   09:05:13
 * @license MIT
 */

namespace Modules\Massmail\Controllers;
use Modules\Massmail\Models\Massmail;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class MassmailController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-massmail.js")
            ->setTargetUri("themes/admin/assets/js/combined-massmail.js")
            ->join(true)
            ->addJs($this->config->application->modulesDir."massmail/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {
        $this->view->pick("index");
    }

    public function sendAction()
    {
        $current= "39";
        $rowCount = "50";
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['columns'] = "email";
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        $email = Massmail::find($arProp);
        $address = array();
        foreach ($email as $item) {
            $address[] = $item->email;
        }
        //print_r($address);

        $template = "Yth. Bapak/Ibu/Sdr<br><br><br>
        Dalam rangka memperingati Hari Lahir Pancasila tahun 2017, Keluarga Besar Universitas Negeri Yogyakarta akan mengadakan kegiatan Upacara Pengibaran Bendera, Oleh karena itu kami mengharap kehadiran Bapak/Ibu/Saudara pada rangkaian kegiatan sebagai berikut:
        <br>
        Hari   : Kamis<br>
        Tanggal: 01 Juni 2017<br>
        Pukul  : 08.00 WIB<br>
        Tempat : Halaman Rektorat UNY<br>
        <br>
        Atas perhatian dan kehadiran Bapak/Ibu/Saudara, kami ucapkan terima kasih.<br>
        <br>
        Rektor,<br>
        <br>
        ttd.<br>
        <br>
        Prof. Dr. Sutrisna Wibawa, M.Pd<br>
        19590901 198601 1 002";
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
            ->setUsername('kepegawaian@uny.ac.id')->setPassword('k4r4ngm4l4ng');
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance('Undangan Upacara Peringatan Hari lahir Pancasila Tahun 2017')
            ->setFrom('kepegawaian@uny.ac.id' )
            ->setTo($address)
            ->setBody($template, 'text/html');
        $attach = \Swift_Attachment::fromPath($this->config->application->modulesDir."massmail/attch/undangan.jpeg")
            ->setFilename("undangan_upacara.jpeg");
        $message->attach(\Swift_Attachment::fromPath($this->config->application->modulesDir."massmail/attch/undangan.jpeg")->setFilename("undangan_upacara.jpeg"));
        $result = $mailer->send($message);
    }

    public function listAction()
    {
        $this->view->disable();
        $arProp = array();
        $current = intval($this->request->getPost('current'));
        $rowCount = intval($this->request->getPost('rowCount'));
        $searchPhrase = $this->request->getPost('searchPhrase');
        $sort = $this->request->getPost('sort');
        if ($searchPhrase != '') {
            $arProp['conditions'] = "title LIKE ?1 OR slug LIKE ?1 OR content LIKE ?1";
            $arProp['bind'] = array(
                1 => "%".$searchPhrase."%"
            );
        }
        $qryTotal = Massmail::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Massmail::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'email' => $item->email,
	'content' => $item->content,
	
                'created' => $item->created
            );
            $no++;
        }
        //$arQry = $qry->toArray();
        $data = array(
            'current'   => $current,
            'rowCount'  => $qry->count(),
            'rows'      => $arQry,
            'total'     => $qryTotal->count(),
            'filter'    => $arProp
        );
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function createAction()
    {
        $this->view->disable();
        $data = new Massmail();
         $data->email = $this->request->getPost('email');
	 $data->content = $this->request->getPost('content');
	
        if($data->save()){
            $alert = "sukses";
            $msg .= "Edited Success ";
        }else{
            $alert = "error";
            $msg .= "Edited failed";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function editAction()
    {
        $this->view->disable();
        $data = Massmail::findFirst($this->request->getPost('hidden_id'));
         $data->email = $this->request->getPost('email');
	 $data->content = $this->request->getPost('content');
	

        if (!$data->save()) {
            foreach ($data->getMessages() as $message) {
                $alert = "error";
                $msg .= $message." ";
            }
        }else{
            $alert = "sukses";
            $msg .= "page was created successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();

    }

    public function getAction()
    {
        $data = Massmail::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Massmail::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Massmail was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}