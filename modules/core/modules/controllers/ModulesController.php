<?php
/**
 * Created by Phalms Module Generator.
 *
 * Phalms Module manager
 *
 * @package Phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-10
 * @time:   20:05:48
 * @license MIT
 */

namespace Modules\Modules\Controllers;
use Modules\Modules\Models\Modules;
use \Phalcon\Mvc\Model\Manager;
use \Phalcon\Tag;
use Modules\Frontend\Controllers\ControllerBase;
class ModulesController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-modules.js")
            ->setTargetUri("themes/admin/assets/js/combined-modules.js")
            ->join(true)
            ->addJs($this->config->modules->core."modules/views/js/js.js")
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
        $qryTotal = Modules::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "created DESC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Modules::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'    => $no,
                'id'    => $item->id,
                'module_name' => $item->module_name,
            	'description' => $item->description,
            	'publish' => $item->publish,
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

    public function editAction()
    {
        $this->view->disable();
        $data = Modules::findFirst($this->request->getPost('hidden_id'));
        $data->module_name = $this->request->getPost('module_name');
	    $data->description = $this->request->getPost('description');
	    $data->publish = $this->request->getPost('publish');

        if (!$data->save()) {
            foreach ($data->getMessages() as $message) {
                $alert = "error";
                $msg .= $message." ";
            }
        }else{
            $alert = "sukses";
            $msg .= "page was created successfully";
        }
        //include $this->config->application->modulesDir.$data->name."/plugin/Publish.php";
        $modules = ucfirst($data->name);
        $class = '\\Modules\\'.$modules.'\Plugin\\Publish';
        $reflect = new \ReflectionClass($class);
        $publish = $reflect->newInstanceArgs([$data->name]);
        if($this->request->getPost('publish') == 1){
            $publish->up();
            $this->addConfig($data->name);
        }else{
            $publish->down();
            $this->dellConfig($data->name);
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("title"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();

    }

    public function getAction()
    {
        $data = Modules::findFirst($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data->toArray());
        return $response->send();
    }

    public function deleteAction($id)
    {
        $this->view->disable();
        $data   = Modules::findFirstById($id);
        if($data->is_core == 1){
            $alert  = "error";
            $msg    = "You dont have permission delete core modules";
        }else{
            if (!$data->delete()) {
                $alert  = "error";
                $msg    = $data->getMessages();
            } else {
                $alert  = "sukses";
                $msg    = "Modules was deleted ";
            }
            $this->delModules($data->name);
        }
        
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    private function delModules($modules)
    {
        $this->dellConfig($modules);
        $this->db->dropTable($modules);
        $this->dellDir($modules);
    }

    private function dellConfig($names)
    {
        $config = include $this->config->application->configDir."modules.php";
        $arr = array_merge(array_diff($config, array($names)));
        file_put_contents($this->config->application->configDir."modules.php", '<?php return [' ."'".implode("','",$arr)."'".'];');
    }

    private function addConfig($names)
    {
        $config = include $this->config->application->configDir."modules.php";
        array_push($config,$names);
        file_put_contents($this->config->application->configDir."modules.php", '<?php return [' ."'".implode("','",$config)."'".'];');
    }

    private function dellDir($name)
    {
        $path = $this->config->application->modulesDir.$name;
        if(!empty($path) && is_dir($path) ){
            $dir  = new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS); 
            $files = new \RecursiveIteratorIterator($dir, \RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($files as $f) {if (is_file($f)) {unlink($f);} else {$empty_dirs[] = $f;} } if (!empty($empty_dirs)) {foreach ($empty_dirs as $eachDir) {rmdir($eachDir);}} rmdir($path);
        }
    }
}