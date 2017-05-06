<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 16:04:22
 */

namespace Modules\Service\Controllers;
use Modules\Service\Models\Service;
use Modules\Cms\Models\Page;
use Modules\Frontend\Controllers\ControllerBase;
class ServiceController extends ControllerBase
{
    public function initialize()
    {

    }

    public function indexAction()
    {
        $this->view->js = "js";
        $this->view->wysiwyg  = 'trumbowy';
        $this->view->pick("index");
    }

    public function pageAction()
    {
        $this->view->disable();
        $data = Page::find();
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
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
        $qryTotal = Service::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Service::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'        => $no,
                'id'        => $item->id,
                'title'     => $item->title,
		        'thumb'     => $item->thumb,
		        'content'   => $item->content,
		        'pageId'    => $item->pageId,
                'page'      => $item->Pages->title,
                'slug'      => $item->Pages->slug,
		        'status'    => $item->status,
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
         if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "service",
                'action' => 'index'
            ]);

            return;
        }
        $msg = "";
       if($this->request->hasFiles() !== false) {

            $uploader = new \Uploader\Uploader([
                'directory' =>  $this->config->application->uploadDir."service/",
                'mimes'     =>  [
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ],
                'extensions'     =>  [
                    'gif',
                    'jpeg',
                    'jpg',
                    'png',
                ],

                'sanitize' => true,  // escape file & translate to latin
                'hash'     => 'md5'
            ]);

            if($uploader->isValid() === true) {

                $uploader->move();

                $file   = $uploader->getInfo();
                $alert  = "sukses";
                $msg    .= $file[0]['filename'];
                $_file  = $file[0]['filename'];
            }
            else {
                $alert  = "error";
                $msg    .= $uploader->getErrors()[0];
                $_file  = "";
            }
        }

        $data = new Service();
        $user = $this->auth->getIdentity();
        $data->title = $this->request->getPost("title");
        $data->thumb   = $_file;
        $data->content = $this->request->getPost("content");
        $data->status = $this->request->getPost("publish");
        $data->pageId = $this->request->getPost("page");
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
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg, 'error' => $uploader->getErrors() ));
        return $response->send();
    }

    public function editAction()
    {
        $this->view->disable();
        $data   = Service::findFirst($this->request->getPost('hidden_id'));
        $path   = $this->config->application->uploadDir."service/";
        $cat    = $this->request->getPost('page');
        $msg    = "";
        if($this->request->hasFiles() !== false) {

            $uploader = new \Uploader\Uploader([
                'directory' =>  $this->config->application->uploadDir."service/",
                'mimes'     =>  [
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ],
                'extensions'     =>  [
                    'gif',
                    'jpeg',
                    'jpg',
                    'png',
                ],

                'sanitize' => true,  // escape file & translate to latin
                'hash'     => 'md5'
            ]);

            if($uploader->isValid() === true) {

                $uploader->move();

                $file   = $uploader->getInfo();
                //$alert  = "sukses";
                $msg    .= $file[0]['filename'];
                $_file  = $file[0]['filename'];
            }
            else {
                //$alert  = "error";
                $msg    .= $uploader->getErrors()[0];
                $_file  = " ";
            }
        }

        $data->title = $this->request->getPost('title');
        $data->content = $this->request->getPost('content');
        $data->status = $this->request->getPost('publish');
        //$data->publish_on = date('Y-m-d H:i:s',strtotime($this->request->getPost("publish_on")));
        if($_file){
            if(strlen($_file) > 0){
                $img    = $page->image;
                if (! empty($img)) {
                    unlink($path.$img);
                }
                $data->image  = $_file;
            }
        }
        if($cat){
            $data->pageId = $cat;
        }
        if($data->save()){
            $alert = "sukses";
            $msg .= "Edited Success ";
        }else{
            $alert = "error";
            foreach ($data->getMessages() as $message) {
                $msg .= $message." ";
            }
            $msg .= "Edited failed";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();

    }

    public function getAction()
    {
        $data = Service::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Service::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Service was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}