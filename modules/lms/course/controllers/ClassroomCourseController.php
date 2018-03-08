<?php

/**
* 
*/
namespace Modules\Course\Controllers;
use Modules\Course\Models\ClassroomCourse;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class ClassroomCourseController extends ControllerBase
{
	
	public function listAction($id)
    {
        $this->view->disable();
        $arProp = array();
        $current = intval($this->request->getPost('current'));
        $rowCount = intval($this->request->getPost('rowCount'));
        //$searchPhrase = $this->request->getPost('searchPhrase');
        $sort = $this->request->getPost('sort');
        
        $arProp['conditions'] = "course_id=?1";
        $arProp['bind'] = array(
                1 => $id
            );
        $qryTotal = ClassroomCourse::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = ClassroomCourse::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'course_id' 	=> $item->course_id,
	            'classroom_id'  => $item->classroom_id,
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

    }

    public function deleteAction()
    {
        
    }
}