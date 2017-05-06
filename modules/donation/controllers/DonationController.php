<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 14:04:21
 */

namespace Modules\Donation\Controllers;
use Modules\Donation\Models\Donation;
use Modules\Frontend\Controllers\ControllerBase;
class DonationController extends ControllerBase
{
    public function initialize()
    {

    }

    public function indexAction()
    {
        $this->view->js = "js";
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
        $qryTotal = Donation::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Donation::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'name'  => $item->name,
                'email'         => $item->email,
                'address'       => $item->address,
                'bank_name'     => $item->bank_name,
                'bank_account'  => $item->bank_account,
                'confirmation'  => $item->confirmation,
                'aprove'        => $item->approve,
                'donation'      => $item->donation,
                'program_id'    => $item->program_id,
                'program'       => $item->Program->title,
                'approve'       => $item->approve,
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


    public function editAction()
    {
        $this->view->disable();
        $data = Donation::findFirst($this->request->getPost('hidden_id'));
		$data->approve  = $this->request->getPost('approved');
        if (!$data->save()) {
            foreach ($data->getMessages() as $message) {
                $alert = "error";
                $msg .= $message." ";
            }
        }else{
            $alert = "sukses";
            $msg .= "donation was updated successfully";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();

    }

    public function getAction()
    {
        $data = Donation::findFirst($this->request->getQuery('id'));
        $result     = array();
        $result['id']   = $data->id;
        $result['name'] = $data->name;
        $result['email']    = $data->email;
        $result['phone']    = $data->phone;
        $result['donation'] = "Rp " . number_format($data->donation,2,',','.');
        $result['program']  = $data->Program->title;
        $result['bank_name']= $data->bank_name;
        $result['bank_account'] = $data->bank_account;
        $result['confirmation'] = ($data->confirmation == '1') ? "Yes" : "No";
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($result);
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Donation::findFirstById($id);

        if (!$data->delete()) {
            $alert  = "error";
            $msg    = $data->getMessages();
        } else {
            $alert  = "sukses";
            $msg    = "Donation was deleted ";
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
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
            ->setCategory("Rekap Donation");
        $objPHPExcel->getActiveSheet()->setTitle('Rekap Program Zakat');
        $table = $objPHPExcel->setActiveSheetIndex(0);
        $table->setCellValue('A1', 'No');
        $table->setCellValue('B1', 'Name');
        $table->setCellValue('C1', 'Email');
        $table->setCellValue('D1', 'Phone');
        $table->setCellValue('E1', 'Address');
        $table->setCellValue('F1', 'Bank Name');
        $table->setCellValue('G1', 'Bank Account');
        $table->setCellValue('H1', 'Bank Destination');
        $table->setCellValue('I1', 'Program');
        $table->setCellValue('J1', 'Donation');
        $table->setCellValue('K1', 'Confirmation');
        $table->setCellValue('L1', 'Approved');
        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no =2;
        $i  =1;
        $report = Donation::find();
        foreach ($report as $item) {
            $ex->setCellValue('A'.$no, $i)
                ->setCellValue('B'.$no, $item->name)
                ->setCellValue('C'.$no, $item->email)
                ->setCellValue('D'.$no, $item->phone)
                ->setCellValue('E'.$no, $this->address)
                ->setCellValue('F'.$no, $item->bank_name)
                ->setCellValue('G'.$no, $item->bank_account)
                ->setCellValue('H'.$no, $item->bank_dest)
                ->setCellValue('I'.$no, $item->Program->title)
                ->setCellValue('J'.$no, $item->donation)
                ->setCellValue('K'.$no, ($item->confirmation == 1) ? "Yes" : "No")
                ->setCellValue('L'.$no, ($item->approve == 1) ? "Yes":"No" );
            $no++;
            $i++;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="rekap_Donation_zakat.xlsx"');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }
}