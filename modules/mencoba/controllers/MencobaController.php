<?php
/**
 * Created by Phalms Module Generator.
 *
 * mencoba
 *
 * @package 
 * @author  
 * @link    
 * @date:   2018-03-06
 * @time:   17:03:44
 * @license MIT
 */

namespace Modules\Mencoba\Controllers;
use Modules\Mencoba\Models\Mencoba;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class MencobaController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-mencoba.js")
            ->setTargetUri("themes/admin/assets/js/combined-mencoba.js")
            ->join(true)
            ->addJs($this->config->application->modulesDir."mencoba/views/js/js.js")
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
        $qryTotal = Mencoba::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Mencoba::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'mencoba' => $item->mencoba,
	'membuat' => $item->membuat,
	
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
        $data = new Mencoba();
         $data->mencoba = $this->request->getPost('mencoba');
	 $data->membuat = $this->request->getPost('membuat');
	
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
        $data = Mencoba::findFirst($this->request->getPost('hidden_id'));
         $data->mencoba = $this->request->getPost('mencoba');
	 $data->membuat = $this->request->getPost('membuat');
	

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
        $data = Mencoba::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Mencoba::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Mencoba was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}