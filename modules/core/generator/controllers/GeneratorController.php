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
            ->addJs($this->config->modules->core."generator/views/js/main.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function indexAction()
    {
        if ($this->request->isPost()) {
            $template = new Template($this->request->getPost());
            $theme  = $template->run();
            $index  = ($this->config->database->adapter == 'Mysql') ? $theme->myprimary : $theme->pgprimary;
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
                '{index_field}'    => $index,
                '{table_fields}'    => $theme->table,
                '{form_fields}'     => $theme->form,
                '{js_fields}'       => $theme->js,
                '{migrate_field}'   => $theme->migrate,
            );
            $filearray = array(
                'router.php',
                'controllers/controller.php',
                'models/model.php',
                'plugin/Publish.php',
                'Modules.php',
                'privateResources.php',
                'views/js/js.js',
                'views/index.volt'
            );

            $url = $this->config->application->modulesDir;
            $this->cpdir($url."generator/src/",$url.$info['{module_name_l}']);
            $moduleurl = $url.$info['{module_name_l}'];

            $template->replace($info,$moduleurl,$filearray);
            $template->rename($moduleurl,$info['{module_name}']);
            $this->setConfig($info['{module_name_l}']);
            $table = new Table($info['{module_name_l}'],$this->request->getPost('fields'));
            $table->regModule($this->request->getPost('description'));
            $res = $table->createTabel();
            $this->flash->success($res);
        }
        $this->view->pick("index");
    }

    private function setConfig($names)
    {
        $config = include $this->config->application->configDir."modules.php";
        array_push($config,$names);
        file_put_contents($this->config->application->configDir."modules.php", '<?php return [' ."'".implode("','",$config)."'".'];');
    }

    private function clean($nametoclean)
    {
        $fixes = array(' ','-');
        return strtolower(str_replace($fixes, '_',$nametoclean));
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