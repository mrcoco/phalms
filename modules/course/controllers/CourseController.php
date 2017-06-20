<?php
/**
 * Created by Phalms Module Generator.
 *
 * course module managemen
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:11
 * @license MIT
 */

namespace Modules\Course\Controllers;
use Modules\Course\Models\Course;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class CourseController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-course.js")
            ->setTargetUri("themes/admin/assets/js/combined-course.js")
            ->join(true)
            ->addJs($this->config->application->modulesDir."course/views/js/js.js")
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
            $arProp['conditions'] = "title LIKE ?1 OR slug LIKE ?1 OR content LIKE ?1";
            $arProp['bind'] = array(
                1 => "%".$searchPhrase."%"
            );
        }
        $qryTotal = Course::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Course::find($arProp);
        $arQry = array();
        $classroom = array();
        $no =1;
        foreach ($qry as $item){
            foreach ($item->Teachers->Classroom as $classrooms) {
                $classroom[] = array(
                    "id" => $classrooms->id,
                    "text" => $classrooms->Grades->name." ".$classrooms->Subjects->name,
                );
            }
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'teacher_id' => $item->teacher_id,
                'teacher_name' => $item->Teachers->name,
                'classroom'    => $classroom,
	            'name'         => $item->name,
	            'description'  => $item->description,
	            'picture'      => $item->picture,
	            'level'        => $item->level,
	
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
        $data = new Course();
         $data->teacher_id = $this->request->getPost('teacher_id');
	 $data->name = $this->request->getPost('name');
	 $data->description = $this->request->getPost('description');
	 $data->picture = $this->request->getPost('picture');
	 $data->level = $this->request->getPost('level');
	
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
        $data = Course::findFirst($this->request->getPost('hidden_id'));
        $data->teacher_id = $this->request->getPost('teacher_id');
    	$data->name = $this->request->getPost('name');
    	$data->description = $this->request->getPost('description');
    	$data->picture = $this->request->getPost('picture');
    	$data->level = $this->request->getPost('level');
	

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
        $data = Course::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Course::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Course was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}