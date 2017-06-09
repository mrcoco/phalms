<?php

/**
 * Created by Phalms Module Generator.
 *
 * school name for multi school system
 *
 * @package lms
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   08:06:46
 * @license MIT
 */
namespace Modules\School\Plugin;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
class Publish extends \Phalcon\Mvc\User\Component
{
    function __construct($table)
    {
        $this->table    = $table;
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

        $arr_column[] = new Column('name', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 225,
	"notNull" => false,
	));
	$arr_column[] = new Column('descriptions', array(
	"type" => Column::TYPE_TEXT,
	"size" => 0,
	"notNull" => true,
	));
	

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
        return $this->db->dropTable('school');
    }
}