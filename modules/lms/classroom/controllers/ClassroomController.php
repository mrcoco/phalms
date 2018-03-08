<?php
/**
 * Created by Phalms Module Generator.
 *
 * Classroom modules
 *
 * @package Phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:40
 * @license MIT
 */

namespace Modules\Classroom\Controllers;
use Modules\Classroom\Models\Classroom;
use Modules\Classroom\Models\ClassroomUser;
use Modules\Classroom\Plugin\Publish;
use Modules\User\Models\Profiles;
use Modules\User\Models\Users;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Modules\Frontend\Controllers\ControllerBase;
class ClassroomController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-classroom.js")
            ->setTargetUri("themes/admin/assets/js/combined-classroom.js")
            ->join(true)
            ->addJs($this->config->modules->lms."classroom/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {
        $this->view->pick("index");
    }

    public function teacherAction()
    {
        $this->view->disable();
        $profile    = Profiles::findFirst([ "name='Teacher'"]);
        $data       = $profile->users;
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function studentAction($id)
    {
        $this->dispatcher->getParam("id");
        $this->view->disable();
        $arProp = array();
        $current = intval($this->request->getPost('current'));
        $rowCount = intval($this->request->getPost('rowCount'));
        //$searchPhrase = $this->request->getPost('searchPhrase');
        $sort = $this->request->getPost('sort');
        if ($searchPhrase != '') {
            $arProp['conditions'] = "title LIKE ?1 OR slug LIKE ?1 OR content LIKE ?1";
            $arProp['bind'] = array(
                1 => "%".$searchPhrase."%"
            );
        }
        $qryTotal = ClassroomUser::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['conditions'] = "classroom_id='{$id}'";
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = ClassroomUser::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'classroom_id'     => $item->school_id,
                'user_id'       => $item->subject_id,
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
        $qryTotal = Classroom::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Classroom::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'school_id'     => $item->school_id,
	            'subject_id'    => $item->subject_id,
	            'major_id'      => $item->major_id,
	            'teacher_id'    => $item->teacher_id,
	            'grade'         => $item->grade,
                'grade_name'    => $item->Grades->name,
                'school_name'   => $item->Schools->name,
                'subject_name'  => $item->Subjects->name,
                'major_name'    => $item->Majors->name,
                'teacher_name'  => $item->Teachers->name,
                'grade_name'    => $item->Grades->name,
	            'description'   => $item->description,
                'created'       => $item->created
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

    public function dataAction()
    {
        $classroom = Classroom::find($arProp);
        $data = array();
        $no =1;
        foreach ($classroom as $item){
            $data[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'school_id'     => $item->school_id,
                'subject_id'    => $item->subject_id,
                'major_id'      => $item->major_id,
                'teacher_id'    => $item->teacher_id,
                'grade'         => $item->grade,
                'grade_name'    => $item->Grades->name,
                'school_name'   => $item->Schools->name,
                'subject_name'  => $item->Subjects->name,
                'major_name'    => $item->Majors->name,
                'teacher_name'  => $item->Teachers->name,
                'grade_name'    => $item->Grades->name,
                'description'   => $item->description,
                'created'       => $item->created
            );
            $no++;
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function byteacherAction($id)
    {
        $classroom = Classroom::find(["teacher_id='{$id}'"]);
        $data = array();
        foreach ($classroom as $item) {
            $data[] = array('label' => $item->Grades->name." ".$item->Subjects->name , 'value' => $item->id );
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function createAction()
    {
        $this->view->disable();
        $data = new Classroom();
        $data->school_id = $this->request->getPost('school_id');
    	$data->subject_id = $this->request->getPost('subject_id');
    	$data->major_id = $this->request->getPost('major_id');
    	$data->teacher_id = $this->request->getPost('teacher_id');
    	$data->grade = $this->request->getPost('grade');
    	$data->description = $this->request->getPost('description');
	    $msg = "";
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
        $data = Classroom::findFirst($this->request->getPost('hidden_id'));
        $data->school_id = $this->request->getPost('school_id');
    	$data->subject_id = $this->request->getPost('subject_id');
    	$data->major_id = $this->request->getPost('major_id');
    	$data->teacher_id = $this->request->getPost('teacher_id');
    	$data->grade = $this->request->getPost('grade');
    	$data->description = $this->request->getPost('description');
	

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
        $item = Classroom::findFirst($this->request->getQuery('id'));
        $data = array(
                'id'    => $item->id,
                'school_id'     => $item->school_id,
                'subject_id'    => $item->subject_id,
                'major_id'      => $item->major_id,
                'teacher_id'    => $item->teacher_id,
                'grade'         => $item->grade,
                'grade_name'    => $item->Grades->name,
                'school_name'   => $item->Schools->name,
                'subject_name'  => $item->Subjects->name,
                'major_name'    => $item->Majors->name,
                'teacher_name'  => $item->Teachers->name,
                'grade_name'    => $item->Grades->name,
                'description'   => $item->description,
                'created'       => $item->created
            );
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Classroom::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Classroom was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}