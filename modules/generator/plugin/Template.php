<?php
namespace Modules\Generator\Plugin;
use Phalcon\Db\Column;
class Template 
{
	function __construct($input)
    {
        $this->input    = $input;
    }

    public function run()
	{
		$model    = "";
		$column   = "";
		$cfield   = "";
		$table    = "";
		$form     = "";
		$js       = "";
		$migrate  = "";
        $pgprimary  = "";
        $myprimary  = "";
		$fields   = $this->input['fields'];
		foreach ($fields as $field) {
			$model  .= $this->makeModel($field);
			$column .= $this->makeColumn($field);
			$cfield .= $this->makeField($field);
			$table  .= $this->makeTable($field);
			$form   .= $this->makeForm($field);
			$js     .= $this->makeJs($field);
			$migrate .= $this->makeMigrate($field);
            $pgprimary .= $this->makePgPrimary($field);
            $myprimary .= $this->makeMyPrimary();
		}
		$result = new \stdClass();
		$result->model  = $model;
		$result->column = $column;
        $result->cfield = $cfield;
        $result->table  = $table;
        $result->form   = $form;
        $result->js     = $js;
        $result->migrate    = $migrate;
        $result->pgprimary  = $pgprimary;
        $result->myprimary  = $myprimary;
		return $result;
	}

	private function clean($nametoclean)
    {
        $fixes = array(' ','-');
        return strtolower(str_replace($fixes, '_',$nametoclean));
    }

    private function makeModel($field)
    {
        $model_fields = '';
        $text = $this->clean($field['name']);
        $dbtype = $this->columnType($field['dbtype']);
        $model_fields .= "/**\n\t";
        $model_fields .= "*\n\t";
        $model_fields .= sprintf("* @var %s\n\t", $dbtype);
        $model_fields .= sprintf("* @Column(type='%s',", $dbtype);
        $model_fields .= sprintf("* length=='%s',", $field['constraint']);
        $model_fields .= sprintf("nullable=%s)\n\t", $field['isnull']);
        $model_fields .= "*\n\t";
        $model_fields .= "*/\n\t";
        $model_fields .= sprintf("public $%s;\n\t", $text);
        return $model_fields;
    }

    private function makeColumn($field)
    {
        $column_fields = '';
        $text = $this->clean($field['name']);
        $column_fields .= sprintf("'%s' => \$item->%s,\n\t", $text, $text);
        return $column_fields;
    }

    private function makeField($field)
    {
        $column_fields = '';
        $text = $this->clean($field['name']);
        $column_fields .= sprintf(" \$data->%s = \$this->request->getPost('%s');\n\t", $text,$text);
        return $column_fields;
    }

    private function makeMigrate($field)
    {

        $migrate_field = "";
        $migrate_field .= sprintf("\$arr_column[] = new Column('%s', array(\n\t",$field['name']);
        $migrate_field .= sprintf('"type" => %s,'."\n\t",$this->dbColumn($field['dbtype']));
        $migrate_field .= sprintf('"size" => %s,'."\n\t",$field['constraint']);
        $migrate_field .= sprintf('"notNull" => %s,'."\n\t",$field['isnull']);
        $migrate_field .= "));\n\t";
        return $migrate_field;
    }

    private function makePgPrimary($field)
    {
        $primary  = '';
        $text     = $this->clean($field['name']);
        $primary .= sprintf('"indexes" => array( new Index("%s_pkey", ["id"], "PRIMARY KEY"))'."\n\t",$text);
        return $primary;
    }

    private function makeMyPrimary()
    {
        $primary = '"indexes" => array( new Index("PRIMARY", array("id")))'."\n\t";
        return $primary;
    }

    private function makeTable($field)
    {
        $table_fields = '';
        $text = $this->clean($field['name']);
        $table_fields .= sprintf('<th data-column-id="%s" data-sortable="false">', $text);
        $table_fields .= sprintf("%s</th>\n\t", ucfirst($text));
        return $table_fields;
    }

    private function makeForm($field)
    {
        $form_fields = '';
        $text = $this->clean($field['name']);
        $form_fields .= $this->typeForm($field['inputtype'],$text);
        return $form_fields;
    }

    private function makeJs($field)
    {
        $column_fields = '';
        $text = $this->clean($field['name']);
        $column_fields .= sprintf(" $('#%s').val(data.%s);\n\t", $text, $text);
        return $column_fields;
    }

    private function typeForm($type,$name)
    {
        switch (strtolower($type)) {
            case 'input':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<input type="text" class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= "</div>\n\t";
                break;
            case 'textarea':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<textarea class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= "</textarea>\n\t";
                $result .= "</div>\n\t";
                break;
            case 'dropdown':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<select class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= '<option value="">--</option>'."\n\t";
                $result .= "</select>\n\t";
                $result .= "</div>\n\t";
                break;
            case 'multiselect':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<select class="form-control" name="%s" id="%s" multiple>'."\n\t",$name,$name);
                $result .= '<option value="">--</option>'."\n\t";
                $result .= "</select>\n\t";
                $result .= '</div>\n\t';
                break;
            case 'checkbox':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";;
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<input type="checkbox" class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= "</div>\n\t";
                break;
            case 'radio':
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";;
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<input type="radio" class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= "</div>\n\t";
                break;    
            default:
                $result = '';
                $result .= '<div class="form-group" >'."\n\t";;
                $result .= sprintf("<label>%s</label>\n\t",ucfirst($name));
                $result .= sprintf('<input type="text" class="form-control" name="%s" id="%s" >'."\n\t",$name,$name);
                $result .= "</div>\n\t";
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

    public function replace($info,$moduleurl,$filearray)
    {
        for ($i = 0; $i < count($filearray); $i++) {
            $filedestination = $moduleurl.'/'.$filearray[$i];

            $current = file_get_contents($filedestination);

            $current = $this->str_replace_assoc($info, $current);

            file_put_contents($filedestination, $current);
        }
    }

    public function rename($moduleurl,$module)
    {
        rename($moduleurl.'/controllers/controller.php', $moduleurl.'/controllers/'.$module.'Controller.php');
        rename($moduleurl.'/models/model.php', $moduleurl.'/models/'.$module.'.php');
    }

    private function str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }

    public function dbColumn($type)
    {
        switch (strtolower($type)){
            case "int"      :
                $result = "Column::TYPE_INTEGER";
                break;
            case "integer"      :
                $result = "Column::TYPE_INTEGER";
                break;
            case  "date"    :
                $result = "Column::TYPE_DATE";
                break;
            case "varchar"  :
                $result = "Column::TYPE_VARCHAR";
                break;
            case "decimal"  :
                $result = "Column::TYPE_DECIMAL";
                break;
            case "datetime" :
                $result = "Column::TYPE_DATETIME";
                break;
            case "char"     :
                $result = "Column::TYPE_CHAR";
                break;
            case "text"     :
                $result = "Column::TYPE_TEXT";
                break;
            case "float"    :
                $result = "Column::TYPE_FLOAT";
                break;
            case "boolean"  :
                $result = "Column::TYPE_BOOLEAN";
                break;
            case "double"   :
                $result = "Column::TYPE_DOUBLE";
                break;
            case "tinyblob" :
                $result = "Column::TYPE_TINYBLOB";
                break;
            case "blob"     :
                $result = "Column::TYPE_BLOB";
                break;
            case "mediumblob" :
                $result = "Column::TYPE_MEDIUMBLOB";
                break;
            case "longblob" :
                $result = "Column::TYPE_LONGBLOB";
                break;
            case "bigint"   :
                $result = "Column::TYPE_BIGINTEGER";
                break;
            case "json"     :
                $result = "Column::TYPE_JSON";
                break;
            case "jsonb"    :
                $result = "Column::TYPE_JSONB";
                break;
            case "timestamp":
                $result = "Column::TYPE_TIMESTAMP";
                break;
            default     :
                $result = "Column::TYPE_VARCHAR";
                break;
        }
        return $result;
    }
}