<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 20:05:54
 */

namespace Modules\Generator\Controllers;
use Modules\Generator\Models\Module;
use Modules\Generator\Plugin\Table;
use Modules\Generator\Plugin\Template;
use Modules\Frontend\Controllers\ControllerBase;
use Phalcon\Db\Column;
use Phalcon\Db\Index;

class GeneratorController extends ControllerBase
{
    public function initialize()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-gen.js")
            ->setTargetUri("themes/admin/assets/js/combined-gen.js")
            ->join(true)
            ->addJs($this->config->application->modulesDir."generator/views/js/main.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {

        if ($this->request->isPost()) {
            $template = new Template($this->request->getPost());
            $theme  = $template->run();
            $info = array(
                '{generator_name}'  => $this->request->getPost('generator_name'),
                '{module_name}'     => \Phalcon\Text::camelize($this->request->getPost('generator_name'), "_-"),
                '{module_url}'      => "http://".$this->config->application->publicUrl."/".$this->clean($this->request->getPost('generator_name'))."/",
                '{module_name_l}'   => $this->clean($this->request->getPost('generator_name')),
                '{model_name}'      => \Phalcon\Text::camelize($this->request->getPost('generator_name'), "_-"),
                '{description}'     => $this->request->getPost('description'),
                '{author}'          => $this->request->getPost('author'),
                '{website}'         => $this->request->getPost('website'),
                '{package}'         => $this->request->getPost('package'),
                '{copyright}'       => $this->request->getPost('copyright'),
                '{date}'            => date("Y-m-d"),
                '{time}'            => date("H:m:s"),
                '{model_fields}'    => $theme->model,
                '{contrl_fields}'   => $theme->column,
                '{column_fields}'   => $theme->cfield,
                '{table_fields}'    => $theme->table,
                '{form_fields}'     => $theme->form,
                '{js_fields}'       => $theme->js,
            );
            $filearray = array(
                'router.php',
                'controllers/controller.php',
                'models/model.php',
                'Modules.php',
                'views/js/js.js',
                'views/index.volt'
            );


            $url = $this->config->application->modulesDir;
            $this->cpdir($url."generator/src/",$url.$info['{module_name_l}']);
            $moduleurl = $url.$info['{module_name_l}'];
            for ($i = 0; $i < count($filearray); $i++) {
                $filedestination = $moduleurl.'/'.$filearray[$i];
                
                $current = file_get_contents($filedestination);
                
                $current = $this->str_replace_assoc($info, $current);
                
                file_put_contents($filedestination, $current);
            }
            
            rename($moduleurl.'/controllers/controller.php', $moduleurl.'/controllers/'.$info['{module_name}'].'Controller.php');
            rename($moduleurl.'/models/model.php', $moduleurl.'/models/'.$info['{module_name}'].'.php');
            $table = new Table($info['{module_name_l}'],$this->request->getPost('fields'));
            $table->createTabel();
        }
        $this->view->pick("index");
    }

    private function clean($nametoclean)
    {
        $fixes = array(' ','-');
        return strtolower(str_replace($fixes, '_',$nametoclean));
    }

    private function str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }

    private function cpdir($source, $dest)
    {
        try{
            mkdir($dest, 0755);
        }catch(\Exception $e){
            $this->flash->error($e->getMessage());
        }

        foreach (
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST) as $item
            ) {
            if ($item->isDir()) {
                try{
                    mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                }catch (\Exception $e){
                    $this->flash->error($e->getMessage());
                }
            } else {
                try{
                    copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                }catch (\Exception $e){
                    $this->flash->error($e->getMessage());
                }
            }
        }
    }



}