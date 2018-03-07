<?php
/**
 * Created by PhpStorm.
 * User: kepegawaian
 * Date: 5/10/2017
 * Time: 10:38 PM
 */

namespace Modules\Generator\Plugin;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Mvc\User\Component;

class Table extends Component
{
    function __construct($table,$column)
    {
        $this->table    = $table;
        $this->column   = $column;
    }

    public function createTabel()
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            ))
        );

        foreach ($this->column as $c) {
            $arr_column[] = new Column($c['name'], array(
                "type" => $this->dbColumn($c['dbtype']),
                "size" => $c['constraint'],
                "notNull" => $c['isnull'],
            ));
        }

        $arr_column[] = new Column("created", array(
            "type"    => Column::TYPE_TIMESTAMP,
            "notNull" => true,
            'default' => 'CURRENT_TIMESTAMP',
        ));

        $arr_column[] = new Column("updated", array(
            "type"    => Column::TYPE_TIMESTAMP,
            "notNull" => false,
        ));

        try{
            if($this->config->database->adapter == 'Mysql'){
                $index = new Index("PRIMARY", array("id"));
            }else{
                $index = new Index($this->table.'_pkey', ['id'], 'PRIMARY KEY');
            }
            $this->db->createTable(strtolower($this->table), null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    $index
                )
            ));
            $result = "Created Table $this->table in Database";
        }catch (\Exception $e){
            $result = $e->getMessage();
        }
        return $result;
    }

    public function regModule($desc)
    {
        return $this->db->insert("modules",
            [
                $this->table,
                $desc,
                0,
                1,
                
            ],
            [
                "name",
                "desc",
                "is_core",
                "publish"
            ]
        );
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
}