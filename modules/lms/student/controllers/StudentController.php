<?php
/**
 * Created by Phalms Module Generator.
 *
 * Student module 
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-14
 * @time:   14:06:05
 * @license MIT
 */

namespace Modules\Student\Controllers;
use Modules\Student\Models\Student;
use Modules\User\Models\Users;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class StudentController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-student.js")
            ->setTargetUri("themes/admin/assets/js/combined-student.js")
            ->join(true)
            ->addJs($this->config->modules->lms."student/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {
        $this->view->pick("index");
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
            $arProp['conditions'] = "profilesId='3' AND name LIKE ?1 ";
            $arProp['bind'] = array(
                1 => "%".$searchPhrase."%"
            );
        }else{
            $arProp['conditions'] = "profilesId='3'";
        }
        $qryTotal = Users::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        
        //$arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Users::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'user_name'    => $item->name,
                'user_id'      => $item->Student->user_id,
            	'nis'          => $item->Student->nis,
            	'nisn'         => $item->Student->nisn,
            	'religion'     => $item->Student->Religions->name,
            	'birthplace'   => $item->Student->birthplace,
            	'birthday' => $item->Student->birthday,
            	'phone'    => $item->Student->phone,
            	'address'  => $item->Student->address,
            	'parrent'  => $item->Student->parrent,
            	'guardian' => $item->Student->guardian,
            	'parrent_phone' => $item->Student->parrent_phone,
            	'picture'  => $item->Student->picture,
            	'cover'    => $item->Student->cover,
            	'bio'      => $item->Student->bio,
	
                //'created' => $item->created
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

    public function create()
    {
        $data = new Student();
        $data->user_id  = $this->request->getPost('user_id');
        $data->nis      = $this->request->getPost('nis');
        $data->nisn     = $this->request->getPost('nisn');
        $data->religion = $this->request->getPost('religion');
        $data->birthplace   = $this->request->getPost('birthplace');
        $data->birthday     = $this->request->getPost('birthday');
        $data->phone    = $this->request->getPost('phone');
        $data->address  = $this->request->getPost('address');
        $data->parrent  = $this->request->getPost('parrent');
        $data->guardian = $this->request->getPost('guardian');
        $data->parrent_phone = $this->request->getPost('parrent_phone');
        $data->picture  = $this->request->getPost('picture');
        $data->cover    = $this->request->getPost('cover');
        $data->bio      = $this->request->getPost('bio');
	
        if($data->save()){
            $alert = "sukses";
            $msg .= "Created Success ";
        }else{
            $alert = "error";
            $msg .= "Created failed";
        }
        $result = array("alert" => $alert, "msg" => $alert);
        return $result;
    }

    public function editAction()
    {
        $this->view->disable();
        $user_id = $this->request->getPost('user_id');
        $data   = Student::findFirst(["user_id='{$user_id}'"]);
        $msg    = "";
        if($data){
            $data->nis      = $this->request->getPost('nis');
            $data->nisn     = $this->request->getPost('nisn');
            $data->religion = $this->request->getPost('religion');
            $data->birthplace = $this->request->getPost('birthplace');
            $data->birthday = $this->request->getPost('birthday');
            $data->phone    = $this->request->getPost('phone');
            $data->address  = $this->request->getPost('address');
            $data->parrent  = $this->request->getPost('parrent');
            $data->guardian = $this->request->getPost('guardian');
            $data->parrent_phone = $this->request->getPost('parrent_phone');
            $data->picture  = $this->request->getPost('picture');
            $data->cover    = $this->request->getPost('cover');
            $data->bio      = $this->request->getPost('bio');
            if (!$data->save()) {
                foreach ($data->getMessages() as $message) {
                    $alert = "error";
                    $msg .= $message." ";
                }
            }else{
                $alert = "sukses";
                $msg .= "page was created successfully";
            }
        }else{
            $_data = $this->create();
            $alert = $_data["alert"];
            $msg .= $_data["msg"];
        }
    	
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("user_id"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();

    }

    public function getAction()
    {
        $id     = $this->request->getQuery('id');
        $data   = Student::findFirst(["user_id='{$id}'"]);
        if($data){
            $result  = array(
                'user_id'   => $id,
                'user_name' => $data->Users->name,
                'nis'       => $data->nis,
                'nisn'      => $data->nisn,
                'religion'  => $data->religion,
                'birthplace' => $data->birthplace,
                'birthday'  => $data->birthday,
                'phone'     => $data->phone,
                'address'   => $data->address,
                'parrent'   => $data->parrent,
                'guardian'  => $data->guardian,
                'parrent_phone' => $data->parrent_phone,
                'picture'   => $data->picture,
                'cover'     => $data->cover,
                'bio'       => $data->bio
            );
        }else{
            $result  = array(
                'user_id'   => $id,
                'user_name' => $data->Users->name,
                'nis'       => "",
                'nisn'      => "",
                'religion'  => "",
                'birthplace' => "",
                'birthday'  => "",
                'phone'     => "",
                'address'   => "",
                'parrent'   => "",
                'guardian'  => "",
                'parrent_phone' => "",
                'picture'   => "",
                'cover'     => "",
                'bio'       => ""
            );
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($result);
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Student::findFirst(["user_id='{$id}'"]);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Data Student was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}