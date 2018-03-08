<?php
/**
 * Created by PhpStorm.
 * User: DwiAgus
 * Date: 10/25/2016
 * Time: 11:29 AM
 */

namespace Modules\Gallery\Controllers;
use Modules\Gallery\Models\Gallery;
use Modules\Gallery\Models\Image;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;

class GalleryController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Manage your Gallery');

        $this->path = $this->config->application->uploadDir."galleries/";
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
        $qryTotal = Gallery::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Gallery::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'title' => $item->title,
                'path'     => $item->path,
                'description'   => substr($item->description,0,200),
                'create_user'   => $item->CreateUsers->name,
                //'update_user'   => $item->UpdateUsers->name,
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
        $response->setJsonContent( $data);
        return $response->send();
    }

    public function imagelistAction()
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
        $qryTotal = Image::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Image::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'title' => $item->title,
                'file_name'     => $this->url->get('upload/galleries/'.$item->Gallery->path."/".$item->file_name),
                'description'   => substr($item->description,0,200),
                'gallery'       => $item->Gallery->title,
                'gallery_id'    => $item->gallery_id,
                'create_user'   => $item->CreateUsers->name,
                //'update_user'   => $item->UpdateUsers->name,
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

    public function indexAction(){
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-gallery.js")
            ->setTargetUri("themes/admin/assets/js/combined-gallery.js")
            ->join(true)
            ->addJs($this->config->modules->addons."gallery/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
        $this->assets
            ->collection('header')
            ->setTargetPath("themes/admin/assets/css/combined-gallery.css")
            ->setTargetUri("themes/admin/assets/css/combined-gallery.css")
            ->join(true)
            ->addCss($this->config->modules->addons."gallery/views/css/css.css")
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        $this->view->pick("gallery/index");
    }

    public function galleryAction()
    {
        $this->view->disable();
        $list = Gallery::find();
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($list->toArray());
        return $response->send();
    }

    public function imageAction()
    {
        $this->view->disable();
        $id = $this->request->getQuery("id");
        $image = Image::findFirst($id);
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($image->toArray());
        return $response->send();
    }
    public function imagecreateAction()
    {
        $this->view->disable();
        $gall = Gallery::findFirst($this->request->getPost('gallery'));
        $path = $this->path.$gall->path;
        $user   = $this->auth->getIdentity();
        $msg    = "";
        $image  = new Image();
        $image->title       = $this->request->getPost('title');
        if($this->request->hasFiles() !== false) {
            if(!is_dir("upload/galleries/".$gall->path)){
                if (!mkdir("upload/galleries/".$gall->path, 0777, true)) {
                    die('Failed to create folders...');
                }
            }
            $uploader = new \Uploader\Uploader([
                'directory' =>  "upload/galleries/".$gall->path,
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
            $image->file_name  = $_file;
        }

        //$image->file_name   = $_file;
        $image->description = $this->request->getPost('description');
        $image->gallery_id  = $this->request->getPost('gallery');
        $image->create_user = $user['id'];
        if (!$image->save()) {
            foreach ($image->getMessages() as $message) {
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

    public function imageeditAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('hidden_id');
        $path   = $this->path;
        $image = Image::findFirst($id);
        $rpath  = "upload/galleries/".$image->Gallery->path."/";
        if($image !== false){
            $msg    = "";
            if($this->request->hasFiles() !== false) {
                if(! empty($_FILE['file']['tmp_name'])) {
                    if (!empty($image->file_name)) {
                        unlink($rpath . $image->file_name);
                    }
                }
                $uploader = new \Uploader\Uploader([
                    'directory' =>  "upload/galleries/".$image->Gallery->path,
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
                    $_file  = "";
                }
            }
            $image->title       = $this->request->getPost('title');
            if($_file){
                $image->file_name   = $_file;
            }
            $image->description = $this->request->getPost('description');
            $image->gallery_id  = $this->request->getPost('gallery');
            $image->create_user = $user['id'];
            if (!$image->update()) {
                foreach ($image->getMessages() as $message) {
                    $alert = "error";
                    $msg .= $message." ";
                }
            }else{
                $alert = "sukses";
                $msg .= "Image was created successfully";
            }

        }else{
            $alert  = "error";
            $msg    = "Image not Found";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function imagedeleteAction($id)
    {
        $this->view->disable();
        $path   = $this->path;
        $image  = Image::findFirst($id);
        //$rpath  = $path.$image->Gallery->path."/";
        $rpath  = "upload/galleries/".$image->Gallery->path."/";
        $msg    = "";
        if ($image !== false) {
            $img    = $image->file_name;
            if (! empty($img)) {
                if(file_exists($rpath.$img)){
                    unlink($rpath.$img);
                }else{
                    $msg    .= "Image not Found";
                }
            }

            if (!$image->delete()) {
                $alert  = "error";
                $msg    .= "";
                foreach ($image->getMessages() as $m):
                    $msg    .= $m ;
                endforeach;
            } else {
                $alert  = "sukses";
                $msg    .= "Image was deleted ";
            }
        }else{
            $alert  = "error";
            $msg    .= "Image not Found";
        }

        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function getAction()
    {
        $this->view->disable();
        $id = $this->request->getQuery('id');
        $gal = Gallery::findFirst($id);
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($gal->toArray());
        return $response->send();

    }
    public function createAction()
    {
        $this->view->disable();
        $dir  = $this->path;
        $path = Tag::friendlyTitle($this->request->getPost("title"));
        $gall = new Gallery();
        $gall->title = $this->request->getPost("title");
        $gall->path  = $path;
        $gall->description = $this->request->getPost("description");
        $gall->create_user = $this->auth->getIdentity()['id'];

        if(!is_dir($dir.$path)){
            if (!mkdir($dir.$path, 0777, true)) {
                die('Failed to create folders...');
            }
        }
        $msg = "";
        if (!$gall->save()) {
            foreach ($gall->getMessages() as $message) {
                $alert = "error";
                $msg .= $message." ";
            }
        }else{
            $alert = "sukses";
            $msg .= "Gallery was created successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function editAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('hidden_id');
        $gall = Gallery::findFirst($id);
        $gall->title = $this->request->getPost("title");
        //$gall->path  = Tag::friendlyTitle($this->request->getPost("title"));
        $gall->description = $this->request->getPost("description");
        $gall->update_user = $this->auth->getIdentity()['id'];
        $msg = "";
        if (!$gall->save()) {
            foreach ($gall->getMessages() as $message) {
                $alert = "error";
                $msg .= $message." ";
            }
        }else{
            $alert = "sukses";
            $msg .= "Gallery was created successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $gall =  Gallery::findFirst($id);
        $dir  = $this->path;
        $path = $gall->path;
        if (!$gall) {
            $alert  = "error";
            $msg    = "Gallery Not Found";
        }

        if(is_dir($dir.$path)){
            rmdir($dir.$path);
        }

        if (!$gall->delete()) {
            $msg = "";
            foreach ($gall->getMessages() as $ms){
                $msg .= $ms." ";
            }
        } else {
            $alert  = "sukses";
            $msg    = "Gallery was deleted successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}