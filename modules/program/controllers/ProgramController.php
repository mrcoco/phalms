<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 14:04:47
 */

namespace Modules\Program\Controllers;
use Modules\Donation\Models\Donation;
use Modules\Program\Models\Program;
use Modules\Program\Models\Location;
use Modules\Frontend\Controllers\ControllerBase;
use Phalcon\Tag;

class ProgramController extends ControllerBase
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
        $qryTotal = Program::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Program::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'title' => $item->title,
                'slug'  => $item->slug,
                'content'       => $item->content,
                'image'         => $item->image,
                'category'      => $item->category,
                'categories'    => $item->Categories->name,
                'start_date'    => $item->start_date,
                'end_date'      => $item->end_date,
                'benefit'       => $item->benefit,
                'location'      => $item->location,
                'locations'     => $item->Locations->name,
                'requirement'   => $item->requirement,
                'status'        => $item->status,
                'donation'      => $this->sumDonation($item->id),
                'create_user'   => $item->create_user,
                'updated'       => $item->updated,
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

    public function sumDonation($id)
    {
        $donation = Donation::sum([
            "column" => "donation",
            "conditions" => "program_id = '{$id}' AND approve=1"

        ]);
        return $donation;
    }

    public function downloadAction()
    {
        $this->view->disable();
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Dwi Agus")
            ->setLastModifiedBy("Dwi Agus")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("export kinerja for Office 2007 XLSX, generated by PHPExcel.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Rekap Program");
        $objPHPExcel->getActiveSheet()->setTitle('Rekap Program Zakat');
        $table = $objPHPExcel->setActiveSheetIndex(0);
        $table->setCellValue('A1', 'No');
        $table->setCellValue('B1', 'Title');
        $table->setCellValue('C1', 'Location');
        $table->setCellValue('D1', 'Requirement');
        $table->setCellValue('E1', 'Collected');
        $table->setCellValue('F1', 'Benefit');
        $table->setCellValue('G1', 'Category');
        $table->setCellValue('H1', 'Start');
        $table->setCellValue('I1', 'End');
        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no =2;
        $i  =1;
        $report = Program::find();
        foreach ($report as $item) {
            //$ex->getStyle('C'.$no)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT)
            $ex->setCellValue('A'.$no, $i)
                ->setCellValue('B'.$no, $item->title)
                ->setCellValue('C'.$no, $item->Locations->name)
                ->setCellValue('D'.$no, $item->requirement)
                ->setCellValue('E'.$no, $this->sumDonation($item->id))
                ->setCellValue('F'.$no, $item->benefit)
                ->setCellValue('G'.$no, $item->Categories->name)
                ->setCellValue('H'.$no, $item->start_date)
                ->setCellValue('I'.$no, $item->end_date);
            $no++;
            $i++;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="rekap_program_zakat.xlsx"');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }

    public function createAction()
    {
        $this->view->disable();
        $user = $this->auth->getIdentity();
        $msg    = "";
        if($this->request->hasFiles() !== false) {

            $uploader = new \Uploader\Uploader([
                'directory' =>  $this->config->application->uploadDir."program",
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
        $data = new Program();
        $data->title    = $this->request->getPost('title');
        $data->slug     = Tag::friendlyTitle($this->request->getPost('title'));
		$data->content  = $this->request->getPost('content');
		$data->image    = $_file;
		$data->category = $this->request->getPost('category');
		$data->start_date   = $this->request->getPost('start');
		$data->end_date     = $this->request->getPost('end');
		$data->benefit      = $this->request->getPost('benefit');
        $data->location      = $this->request->getPost('location');
		$data->requirement  = $this->request->getPost('requirement','int');
		$data->status       = $this->request->getPost('publish');
        $data->updated      = "0000-00-00 00:00:00";
		$data->create_user  = $user['id'];
        if($data->save()){
            $alert = "sukses";
            $msg .= "Create Success ";
        }else{
            $alert = "error";
            foreach ($data->getMessages() as $message) {
                $msg .= $message." ";
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
        $data = Program::findFirst($this->request->getPost('hidden_id'));
        $msg  = "";
        if($this->request->hasFiles() !== false) {
            if(! empty($_FILE['file']['tmp_name'])) {
                if (!empty($data->image)) {
                    unlink($this->config->application->uploadDir . "program/" . $data->image);
                }
            }
            $uploader = new \Uploader\Uploader([
                'directory' => $this->config->application->uploadDir . "program",
                'mimes' => [
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ],
                'extensions' => [
                    'gif',
                    'jpeg',
                    'jpg',
                    'png',
                ],

                'sanitize' => true,  // escape file & translate to latin
                'hash' => 'md5'
            ]);

            if ($uploader->isValid() === true) {

                $uploader->move();

                $file = $uploader->getInfo();
                $msg .= $file[0]['filename'];
                $_file = $file[0]['filename'];
            } else {
                $msg .= $uploader->getErrors()[0];
                $_file = "";
            }
        }
        if(isset($_file)){
            $data->image    = $_file;
        }
        $data->title    = $this->request->getPost('title');
        $data->slug     = Tag::friendlyTitle($this->request->getPost('title'));
        $data->content  = $this->request->getPost('content');
        $data->category = $this->request->getPost('category');
        $data->start_date   = $this->request->getPost('start');
        $data->end_date     = $this->request->getPost('end');
        $data->benefit      = $this->request->getPost('benefit');
        $data->requirement  = $this->request->getPost('requirement','int');
        $data->status       = $this->request->getPost('publish');
	

        if (!$data->update()) {
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

    public function locationAction()
    {
        $data   = Location::find();
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function getAction()
    {
        $data = Program::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Program::findFirstById($id);
        $rpath  = $this->config->application->uploadDir . "program/";
        if (!empty($data->image)) {
            unlink($rpath . $data->image);
        }
        if (!$data->delete()) {
            $alert  = "error";
            foreach ($data->getMessages() as $message) {
                $msg .= $message." ";
            }
        } else {
            $alert  = "sukses";
            $msg    = "Program was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }
}