<?php

/**
 * Created by Phalms Module Generator.
 *
 * Classroom modules
 *
 * @package Phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:40
 * @license MIT
 */
namespace Modules\Classroom\Plugin;
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
        $classroom  = $this->classroom();
        $usermeta   = $this->user_meta();
        $user       = $this->classroom_user();
        try{
            // $this->db->createTable(strtolower($this->table), null, array(
            //     "columns" => $classroom,
            //     "indexes" => array(
            //         new Index("PRIMARY", array("id"))
            //     )
            // ));

            // $this->db->createTable("user_meta", null, array(
            //     "columns" => $usermeta,
            //     "indexes" => array(
            //         new Index("PRIMARY", array("id"))
            //     )
            // ));
            $this->db->createTable("classroom_user", null, array(
                "columns" => $classroom_user,
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

    public function classroom()
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            ))
        );

        $arr_column[] = new Column('school_id', array(
            "type" => Column::TYPE_INTEGER,
            "size" => 11,
            "notNull" => false,
        ));
        $arr_column[] = new Column('subject_id', array(
            "type" => Column::TYPE_INTEGER,
            "size" => 11,
            "notNull" => false,
        ));
        $arr_column[] = new Column('major_id', array(
            "type" => Column::TYPE_INTEGER,
            "size" => 11,
            "notNull" => false,
        ));
        $arr_column[] = new Column('teacher_id', array(
            "type" => Column::TYPE_INTEGER,
            "size" => 11,
            "notNull" => false,
        ));
        $arr_column[] = new Column('grade', array(
            "type" => Column::TYPE_VARCHAR,
            "size" => 255,
            "notNull" => false,
        ));
        $arr_column[] = new Column('description', array(
            "type" => Column::TYPE_TEXT,
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
        return $arr_column;
    }

    public function user_meta()
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("user_id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column('nis', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('nisn', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column("religion", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column('birthplace', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('birthday', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('phone', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('address', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('parrent', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('guardian', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('parrent_phone', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('picture', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('cover', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )), 
            new Column('bio', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )),
            new Column("created", array(
                "type"    => Column::TYPE_TIMESTAMP,
                "size"    => 17,
                "notNull" => true,
            )),
            new Column("updated", array(
                "type"    => Column::TYPE_TIMESTAMP,
                "size"    => 17,
                "notNull" => false,
            ))
        );
        return $arr_column;
    }

    public function classroom_user()
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("classroom_id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("user_id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("created", array(
                "type"    => Column::TYPE_TIMESTAMP,
                "size"    => 17,
                "notNull" => true,
            )),
            new Column("updated", array(
                "type"    => Column::TYPE_TIMESTAMP,
                "size"    => 17,
                "notNull" => false,
            ))
        );
        return $arr_column;
    }

    public function down()
    {
        return $this->db->dropTable('classroom');
    }
}