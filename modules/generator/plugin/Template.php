<?php
namespace Modules\Generator\Plugin;
class Template 
{
	function __construct($input)
    {
        $this->input = $input;
    }

    public function run()
	{
		$model  = "";
		$column = "";
		$cfield = "";
		$table  = "";
		$form   = "";
		$js     = "";
		$fields= $this->input['fields'];
		foreach ($fields as $field) {
			$model  .= $this->makeModel($field);
			$column .= $this->makeColumn($field);
			$cfield .= $this->makeField($field);
			$table  .= $this->makeTable($field);
			$form   .= $this->makeForm($field);
			$js     .= $this->makeJs($field);
		}
		$result = new \stdClass();
		$result->model  = $model;
		$result->column = $column;
        $result->cfield = $cfield;
        $result->table  = $table;
        $result->form   = $form;
        $result->js     = $js;
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
        $model_fields .= sprintf("nullable=%s)\n\t", $field['isnull']);
        $model_fields .= sprintf("public $%s;\n\t", $text);
        $model_fields .= "*\n\t";
        $model_fields .= "*/\n\t";
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
        $column_fields .= sprintf(" \$item->%s;\n\t", $text);

        return $column_fields;
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
}