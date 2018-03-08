<?php
/**
 * Created by PhpStorm.
 * User: DwiAgus
 * Date: 10/25/2016
 * Time: 11:29 AM
 */

namespace Modules\Banner\Controllers;

use Modules\Banner\Models\Banner;
use Modules\Frontend\Controllers\ControllerBase;
use Phalcon\Assets\Resource\Js;

class BannerController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Manage your Banner');
        $this->view->wysiwyg = 'summernote';
        $this->path = $this->config->application->uploadDir."banner/";
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-banner.js")
            ->setTargetUri("themes/admin/assets/js/combined-banner.js")
            ->join(true)
            ->addJs($this->config->modules->addons."banner/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
        $this->assets
            ->collection('header')
            ->setTargetPath("themes/admin/assets/css/combined-banner.css")
            ->setTargetUri("themes/admin/assets/css/combined-banner.css")
            ->join(true)
            ->addCss($this->config->modules->addons."banner/views/css/css.css")
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        
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
        $qryTotal = Banner::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Banner::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $description = $item->description." ".$item->description1;
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'file'  => $this->url->get('upload/banner/'.$item->file),
                'link'  => $item->link,
                'description'   => substr($description,0,200),
                'create_user'   => $item->CreateUsers->name,
                'publish'       => $item->publish,
                'created'       => $item->created,
                'updated'       => $item->updated
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

    /**
     * Edits a banner
     *
     * @param string $id
     */
    public function editAction()
    {
        $this->view->disable();
        $id = $this->request->getPost("hidden_id");
        $banner = Banner::findFirst($id);
        $msg ="";
        if($this->request->hasFiles() !== false) {
            if(! empty($_FILE['file']['tmp_name'])) {
                if (!empty($banner->file)) {
                    unlink("upload/banner/" . $banner->file);
                }
            }
            $uploader = new \Uploader\Uploader([
                'directory' =>  "upload/banner/",
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
                $msg    .= $uploader->getErrors();
                $_file  = "";
            }
        }

        if(isset($_file)){
            $banner->file           = $_file;
        }

        $banner->order          = $this->request->getPost("order");
        $banner->publish        = $this->request->getPost("publish");
        $banner->description    = $this->request->getPost("description");
        $banner->description1   = $this->request->getPost("description1");
        $banner->link           = $this->request->getPost("link");
        $banner->update_user    = $this->auth->getIdentity()['id'];
        if (!$banner->save()) {
            $alert  = "error";
            foreach ($banner->getMessages() as $message) {
                $msg .= $message." ";
            }
        }else{
            $alert  = "sukses";
            $msg    .= "Banner was edit successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function getAction()
    {
        $id = $this->request->getQuery('id');
        $banner = Banner::findFirst($id);
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($banner->toArray());
        return $response->send();
    }

    /**
     * Creates a new banner
     */
    public function createAction()
    {
        $this->view->disable();
        $msg = "";
        if(!is_dir("upload/banner/")){
            if (!mkdir($this->path, 0777, true)) {
                die('Failed to create folders...');
            }
        }
        if($this->request->hasFiles() !== false) {

            $uploader = new \Uploader\Uploader([
                'directory' =>  "upload/banner/",
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
                $msg    .= $file[0]['filename']." ";
                $_file  = $file[0]['filename'];
            }
            else {
                $alert  = "error";
                $msg    .= $uploader->getErrors()[0];
                $_file  = " ";
            }
        }
        $banner = new Banner();
        $banner->order          = $this->request->getPost("order");
        $banner->publish        = $this->request->getPost("publish");
        $banner->description    = $this->request->getPost("description");
        $banner->description1   = $this->request->getPost("description1");
        $banner->link           = $this->request->getPost("link");
        $banner->file           = $_file;
        $banner->create_user    = $this->auth->getIdentity()['id'];

        if (!$banner->save()) {
            $alert  = "error";
            foreach ($banner->getMessages() as $message) {
                $msg .= $message." ";
            }
        }else{
            $alert  = "sukses";
            $msg    .= "Banner was created successfully";
        }

        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $_file,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    /**
     * Deletes a banner
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $this->view->disable();
        $banner = Banner::findFirstByid($id);
        if (!$banner) {
            $alert  = "error";
            $msg    = "banner not Found";
        }
        if (! empty($banner->file)) {
            if(file_exists($this->path.$banner->file)){
                unlink($this->path.$banner->file);
            }
        }
        if (!$banner->delete()) {
            $alert  = "error";
            $msg    = " ";
            foreach ($banner->getMessages() as $message) {
                $msg .= $message." ";
            }
        }else{
            $alert  = "sukses";
            $msg    = "banner was deleted ";
        }

        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

}