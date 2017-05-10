<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 20:05:54
 */

namespace Modules\Generator\Controllers;
use Modules\Generator\Models\Module;
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
            $this->createTabel($info['{module_name_l}'],$this->request->getPost('fields'));
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


    public function dbColumn($type)
    {
        switch (strtolower($type)){
            case "int"      :
                $result = Column::TYPE_INTEGER;
                break;
            case "integer"      :
                $result = Column::TYPE_INTEGER;
                break;
            case  "date"    :
                $result = Column::TYPE_DATE;
                break;
            case "varchar"  :
                $result = Column::TYPE_VARCHAR;
                break;
            case "decimal"  :
                $result = Column::TYPE_DECIMAL;
                break;
            case "datetime" :
                $result = Column::TYPE_DATETIME;
                break;
            case "char"     :
                $result = Column::TYPE_CHAR;
                break;
            case "text"     :
                $result = Column::TYPE_TEXT;
                break;
            case "float"    :
                $result = Column::TYPE_FLOAT;
                break;
            case "boolean"  :
                $result = Column::TYPE_BOOLEAN;
                break;
            case "double"   :
                $result = Column::TYPE_DOUBLE;
                break;
            case "tinyblob" :
                $result = Column::TYPE_TINYBLOB;
                break;
            case "blob"     :
                $result = Column::TYPE_BLOB;
                break;
            case "mediumblob" :
                $result = Column::TYPE_MEDIUMBLOB;
                break;
            case "longblob" :
                $result = Column::TYPE_LONGBLOB;
                break;
            case "bigint"   :
                $result = Column::TYPE_BIGINTEGER;
                break;
            case "json"     :
                $result = Column::TYPE_JSON;
                break;
            case "jsonb"    :
                $result = Column::TYPE_JSONB;
                break;
            case "timestamp":
                $result = Column::TYPE_TIMESTAMP;
                break;
            default     :
                $result = Column::TYPE_VARCHAR;
                break;
        }
        return $result;
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

    private function createTabel($table,$column)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            ))
        );

        foreach ($column as $c) {
            $arr_column[] = new Column($c['name'], array(
                "type" => $this->dbColumn($c['dbtype']),
                "size" => $c['constraint'],
                "notNull" => $c['isnull'],
            ));
        }

        $arr_column[] = new Column("created", array(
            "type"    => Column::TYPE_TIMESTAMP,
            "size"    => 17,
            "notNull" => true,
        ));

        try{
            $this->db->createTable(strtolower($table), null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $this->flash->success("Created Tablse $table in Database");
        }catch (\Exception $e){
            $this->flash->error($e->getMessage());
        }

    }

}