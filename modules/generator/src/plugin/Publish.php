<?php

/**
 * Created by PhpStorm.
 * User: kepegawaian
 * Date: 5/11/2017
 * Time: 1:12 AM
 */
namespace Modules\{module_name}\Plugin;
use Phalcon\Db\Column;
class Publish extends \Phalcon\Mvc\User\Component
{
    function __construct($table,$column)
    {
        $this->table    = $table;
        $this->column   = $column;
    }

    public function up()
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            ))
        );

        {migrate_field}

        $arr_column[] = new Column("created", array(
            "type"    => Column::TYPE_TIMESTAMP,
            "size"    => 17,
            "notNull" => true,
        ));

        $arr_column[] = new Column("updated", array(
            "type"    => Column::TYPE_TIMESTAMP,
            "size"    => 17,
            "notNull" => false,
        ));

        try{
            $this->db->createTable(strtolower($this->table), null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $result = "Created Table $this->table in Database";
        }catch (\Exception $e){
            $result = $e->getMessage();
        }
        return $result;
    }

    public function down()
    {
        return $this->db->dropTable('{module_name_l}');
    }
}