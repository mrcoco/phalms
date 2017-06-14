<?php

/**
 * Created by Phalms Module Generator.
 *
 * Student module 
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-14
 * @time:   14:06:05
 * @license MIT
 */
namespace Modules\Student\Plugin;
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

        $arr_column[] = new Column('user_id', array(
	"type" => Column::TYPE_INTEGER,
	"size" => 11,
	"notNull" => false,
	));
	$arr_column[] = new Column('nis', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('nisn', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('religion', array(
	"type" => Column::TYPE_INTEGER,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('birthplace', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('birthday', array(
	"type" => Column::TYPE_DATE,
	"size" => 0,
	"notNull" => false,
	));
	$arr_column[] = new Column('phone', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('address', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 0,
	"notNull" => false,
	));
	$arr_column[] = new Column('parrent', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('guardian', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('parrent_phone', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('picture', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('cover', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('bio', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
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
        return $this->db->dropTable('student');
    }
}