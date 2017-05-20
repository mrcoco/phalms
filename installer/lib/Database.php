<?php 
namespace Phalms\Installer;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
/**
* 
*/
class Database 
{
	
	public static function configDb($input)
	{
		$adapter = '\Phalcon\Db\Adapter\Pdo\\' . $input["dbadapter"];
        $connection = new $adapter(
            [
                "host" 		=> $input["dbserver"],
                "port" 		=> $input["dbport"],
                "username" 	=> $input["dbusername"],
                "password" 	=> $input["dbpassword"],
                "dbname" 	=> $input["dbname"],
            ]
        );
        return $connection;
	}

	public static function emailConfirmations()
	{
		$arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("usersId", array(
                "type"  	=> Column::TYPE_INTEGER,
                "size"  	=> 10,
                "notNull"	=> true,
            )),
            new Column('code', array(
				"type" 		=> Column::TYPE_VARCHAR,
				"size" 		=> 32,
				"notNull" 	=> false,
			)),
			new Column("createdAt", array(
                "type"  	=> Column::TYPE_INTEGER,
                "size"  	=> 10,
                "notNull"	=> true,
            )),
            new Column("modifiedAt", array(
                "type"  	=> Column::TYPE_INTEGER,
                "size"  	=> 10,
                "notNull"   => false,
            )),
            new Column("confirmed", array(
                "type"  	=> Column::TYPE_CHAR,
                "size"  	=> 1,
                "notNull"   => false,
            )),
        );
        return $arr_column;
	}

	public function failedLogins()
	{
		$arr_column = array(
			new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
		);
		return $arr_column;
	}

	public function passwordChanges()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );

        return $arr_column;
	}

	public function permissions()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

	public function profiles()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

	public function rememberTokens()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

	public function resetPasswords()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

	public function successLogins()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

	public static function users()
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
        );
        return $arr_column;
	}

    public static function privateResource($db)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("resource", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
            new Column("action", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
        );
        try {
            $db->createTable('resource', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $result = "Create Table Resource Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}