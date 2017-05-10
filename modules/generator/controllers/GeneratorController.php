<?php
/**
 * Created by Vokuro-Cli.
 * User: dwiagus
 * Date: !data
 * Time: 20:05:54
 */

namespace Modules\Generator\Controllers;
use Modules\Generator\Models\Module;
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
                '{model_fields}'    => $this->makeModel($this->request->getPost('fields')),
                '{contrl_fields}'   => $this->makeColumn($this->request->getPost('fields')),
                '{column_fields}'   => $this->makeField($this->request->getPost('fields')),
                '{table_fields}'    => $this->makeTable($this->request->getPost('fields')),
                '{form_fields}'     => $this->makeForm($this->request->getPost('fields')),
                '{js_fields}'       => $this->makeJs($this->request->getPost('fields')),
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

    private function makeModel($fields)
    {
        $model_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $dbtype = $this->columnType($field['dbtype']);
            $model_fields .= "/**\n\t";
            $model_fields .= "*\n\t";
            $model_fields .= sprintf("* @var %s\n\t", $dbtype, $dbtype);
            $model_fields .= sprintf("* @Column(type='%s',", $dbtype, $dbtype);
            $model_fields .= sprintf("nullable=%s)\n\t", $field['isnull'], $field['isnull']); 
            $model_fields .= sprintf("public $%s;\n\t", $text, $text);
            $model_fields .= "*\n\t";
            $model_fields .= "*/\n\t";
        }
        return $model_fields;
    }

    private function makeColumn($fields)
    {
        $column_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $column_fields .= sprintf("'%s' => \$item->%s,\n\t", $text, $text);
        }
        return $column_fields;
    }

    private function makeField($fields)
    {
        $column_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $column_fields .= sprintf(" \$item->%s;\n\t", $text, $text);
        }
        return $column_fields;
    }

    private function makeTable($fields)
    {
        $table_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $table_fields .= sprintf('<th data-column-id="%s" data-sortable="false">', $text, $text);
            $table_fields .= sprintf("%s</th>\n\t", ucfirst($text), ucfirst($text));
        }
        return $table_fields;
    }

    private function makeForm($fields)
    {
        $form_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $form_fields .= $this->typeForm($field['inputtype'],$text);
        }
        return $form_fields;
    }

    private function makeJs($fields)
    {
        $column_fields = '';
        foreach ($fields as $field) {
            $text = $this->clean($field['name']);
            $column_fields .= sprintf(" $('#%s').val(data.%s);\n\t", $text, $text);
        }
        return $column_fields;
    }

    private function typeForm($type,$name)
    {
        switch (strtolower($type)) {
            case 'input':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<input type="text" class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '</div>\n\t';
                break;
            case 'textarea':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<textarea class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '</textarea>\n\t';
                $result .= '</div>\n\t';
                break;
            case 'dropdown':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<select class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '<option value="">--</option>\n\t';
                $result .= '</select>\n\t';
                $result .= '</div>\n\t';
                break;
            case 'multiselect':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<select class="form-control" name="%s" id="%s" multiple>\n\t',$name,$name);
                $result .= '<option value="">--</option>\n\t';
                $result .= '</select>\n\t';
                $result .= '</div>\n\t';
                break;
            case 'checkbox':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<input type="checkbox" class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '</div>\n\t';
                break;
            case 'radio':
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<input type="radio" class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '</div>\n\t';
                break;    
            default:
                $result = '';
                $result .= '<div class="form-group" >\n\t';
                $result .= sprintf('<label>%s</label>\n\t',ucfirst($name),ucfirst($name));
                $result .= sprintf('<input type="text" class="form-control" name="%s" id="%s" >\n\t',$name,$name);
                $result .= '</div>\n\t';
                break;
        }
        return $result;
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

    public function columnType($type)
    {
        switch (strtolower($type)) {
            case 'int':
            case 'bigint':
                return 'integer';
                break;
            case 'decimal':
            case 'float':
                return 'double';
                break;
            case 'date':
            case 'varchar':
            case 'datetime':
            case 'char':
            case 'text':
                return 'string';
                break;
            default:
                return 'string';
                break;
        }
    }

    private function cpdir($source, $dest)
    {
        mkdir($dest, 0755);
        foreach (
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST) as $item
            ) {
            if ($item->isDir()) {
                mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } else {
                copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
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

            $result = "Created Table $table in Database";
        }catch (Exception $e){
            $result = $e->getMessage("Failed Table $table in Database");
        }
        return $result;
    }

}