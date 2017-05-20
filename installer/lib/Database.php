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
        try {
            $result = "Create Table User Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
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
            $query = "INSERT INTO `resource` VALUES ('1', 'banner', 'index'), ('2', 'banner', 'list'), ('3', 'banner', 'edit'), ('4', 'banner', 'get'), ('5', 'banner', 'create'), ('6', 'banner', 'delete'), ('7', 'blog_category', 'index'), ('8', 'blog_category', 'all'), ('9', 'blog_category', 'list'), ('10', 'blog_category', 'create'), ('11', 'blog_category', 'edit'), ('12', 'blog_category', 'delete'), ('13', 'blog', 'index'), ('14', 'blog', 'list'), ('15', 'blog', 'create'), ('16', 'blog', 'edit'), ('17', 'blog', 'get'), ('18', 'blog', 'delete'), ('19', 'page_category', 'index'), ('20', 'page_category', 'all'), ('21', 'page_category', 'list'), ('22', 'page_category', 'create'), ('23', 'page_category', 'edit'), ('24', 'page_category', 'delete'), ('25', 'page', 'index'), ('26', 'page', 'list'), ('27', 'page', 'create'), ('28', 'page', 'edit'), ('29', 'page', 'get'), ('30', 'page', 'delete'), ('31', 'base', 'index'), ('46', 'gallery', 'list'), ('47', 'gallery', 'imagelist'), ('48', 'gallery', 'index'), ('49', 'gallery', 'gallery'), ('50', 'gallery', 'image'), ('51', 'gallery', 'imagecreate'), ('52', 'gallery', 'imageedit'), ('53', 'gallery', 'imagedelete'), ('54', 'gallery', 'get'), ('55', 'gallery', 'create'), ('56', 'gallery', 'edit'), ('57', 'gallery', 'delete'), ('58', 'gallery', 'index'), ('59', 'generator', 'index'), ('66', 'menu', 'index'), ('67', 'menu', 'list'), ('68', 'menu', 'create'), ('69', 'menu', 'edit'), ('70', 'menu', 'get'), ('71', 'menu', 'delete'), ('72', 'modules', 'index'), ('73', 'modules', 'list'), ('74', 'modules', 'edit'), ('75', 'modules', 'get'), ('76', 'modules', 'delete'), ('82', 'permissions', 'index'), ('83', 'profiles', 'index'), ('84', 'profiles', 'list'), ('85', 'profiles', 'search'), ('86', 'profiles', 'create'), ('87', 'profiles', 'edit'), ('88', 'profiles', 'delete'), ('92', 'users', 'index'), ('93', 'users', 'list'), ('94', 'users', 'create'), ('95', 'users', 'get'), ('96', 'users', 'edit'), ('97', 'users', 'delete'), ('98', 'users', 'changePassword');";
            $db->execute($query);
            $result = "Create Table Resource Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    public static function CreateTable($db)
    {
        $result = [
            "resources" => self::privateResource($db),
            "users"     => self::users($db)
        ];
        return $result;
    }
}