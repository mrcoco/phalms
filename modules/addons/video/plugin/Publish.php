<?php

/**
 * Created by Phalms Module Generator.
 *
 * show video on frontend
 *
 * @package phalmsmodule
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-05-12
 * @time:   16:05:33
 * @license MIT
 */
namespace Modules\Video\Plugin;
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
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('url', array(
	"type" => Column::TYPE_VARCHAR,
	"size" => 255,
	"notNull" => false,
	));
	$arr_column[] = new Column('publish', array(
	"type" => Column::TYPE_INTEGER,
	"size" => 11,
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
        return $this->db->dropTable('video');
    }
}