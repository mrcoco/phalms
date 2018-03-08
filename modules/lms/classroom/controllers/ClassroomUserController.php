<?php
/**
 * Created by Phalms Module Generator.
 *
 * ClassRoom User Module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    
 * @date:   2017-06-13
 * @time:   11:06:05
 * @license MIT
 */

namespace Modules\Classroom\Controllers;
use Modules\Classroom\Models\ClassroomUser;
use Modules\User\Models\Users;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class ClassroomUserController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-classroomuser.js")
            ->setTargetUri("themes/admin/assets/js/combined-classroomuser.js")
            ->join(true)
            ->addJs($this->config->application->modulesDir."classroomuser/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {
        $this->view->disable();
        $id = $this->dispatcher->getParam("id");
        $crud = $this->dispatcher->getParam("crud");
        switch ($cr) {
        	case 'value':
        		# code...
        		break;
        	
        	default:
        		# code...
        		break;
        }
    }

    public function allAction()
    {
        $user = Users::find(["profilesId='3'"]);
        $data = array();
        foreach ($user as $item) {
            $data[] = array('label' => $item->name , 'value' => $item->id );
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    public function listAction($id)
    {
        $this->view->disable();
        $arProp = array();
        $current = intval($this->request->getPost('current'));
        $rowCount = intval($this->request->getPost('rowCount'));
        //$searchPhrase = $this->request->getPost('searchPhrase');
        $this->dispatcher->getParam("title");
        $sort = $this->request->getPost('sort');
        // if ($searchPhrase != '') {
        //     $arProp['conditions'] = "title LIKE ?1 OR slug LIKE ?1 OR content LIKE ?1";
        //     $arProp['bind'] = array(
        //         1 => "%".$searchPhrase."%"
        //     );
        // }
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
                'classroom_id'  => $item->classroom_id,
				'user_id'       => $item->user_id,
                'user_name'     => $item->Users->name,
	            'grade_name'    => $item->Classroom->Grades->name,
                'subject_name'  => $item->Classroom->Subjects->name,   
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
        $classroom_id   = $this->request->getPost('classroom_id');
        $user_id        = $this->request->getPost('user_id');
        $msg            = "";
        $find = Classroomuser::findFirst(["classroom_id='{$classroom_id}' AND user_id='{$user_id}'"]);
        if($find)
        {
            $alert = "error";
            $msg .= "Created failed. Student exsists";
        }else{
            $data = new Classroomuser();
            $data->classroom_id    = $classroom_id;
            $data->user_id         = $user_id;
        
            if($data->save()){
                $alert = "sukses";
                $msg .= "Edited Success ";
            }else{
                $alert = "error";
                $msg .= "Edited failed";
            }
        }
        
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function editAction()
    {
        $this->view->disable();
        $data = Classroomuser::findFirst($this->request->getPost('hidden_id'));
         $data->classroom_id = $this->request->getPost('classroom_id');
	 $data->user_id = $this->request->getPost('user_id');
	

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
        $data = Classroomuser::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Classroomuser::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Classroomuser was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}