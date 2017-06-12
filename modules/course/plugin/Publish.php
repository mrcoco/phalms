<?php

/**
 * Created by Phalms Module Generator.
 *
 * course module managemen
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:11
 * @license MIT
 */
namespace Modules\Course\Plugin;
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

        $arr_column[] = new Column('teacher_id', array(
    	"type" => Column::TYPE_VARCHAR,
    	"size" => 11,
    	"notNull" => false,
    	));
    	$arr_column[] = new Column('name', array(
    	"type" => Column::TYPE_VARCHAR,
    	"size" => 255,
    	"notNull" => false,
    	));
    	$arr_column[] = new Column('description', array(
    	"type" => Column::TYPE_TEXT,
    	"size" => 0,
    	"notNull" => false,
    	));
    	$arr_column[] = new Column('picture', array(
    	"type" => Column::TYPE_VARCHAR,
    	"size" => 255,
    	"notNull" => false,
    	));
    	$arr_column[] = new Column('level', array(
    	"type" => Column::TYPE_INTEGER,
    	"size" => 0,
    	"notNull" => false,
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
        return $this->db->dropTable('course');
    }
}