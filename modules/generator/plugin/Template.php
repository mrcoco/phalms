<?php
namespace Modules\Generator\Plugin;
class Template 
{
	public function run($input)
	{
		$model = "";
		$fields= $input['fields']
		foreach ($fields as $field) {
			$model .= $this->makeModel($field);
		}
		$result['model'] = $model;
		return $result;
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
        //foreach ($fields as $field) {
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
        //}
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
}