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

	public static function emailConfirmations($db)
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
        try {
            $db->createTable('email_confirmations', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                )
            ));
            $result = "Create Table Email Confirmation Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function failedLogins($db)
	{
		$arr_column = array(
			new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column('usersId', array(
                "type"      => Column::TYPE_INTEGER,
                "size"      => 10,
                "notNull"   => false,
            )),
            new Column('ipAddress', array(
                "type"      => Column::TYPE_CHAR,
                "size"      => 15,
                "notNull"   => false,
            )),
            new Column('attempted', array(
                "type"      => Column::TYPE_INTEGER,
                "size"      => 10,
                "notNull"   => false,
            )),
		);
        try {
            $db->createTable('failed_logins', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("usersId", array("usersId")),
                )
            ));
            $result = "Create Table Failed Login Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
		return $result;
	}

	public static function passwordChanges($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("usersId", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("ipAddress", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 15,
                "notNull"       => true,
            )),
            new Column("userAgent", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 48,
                "notNull"       => true,
            )),
            new Column("createdAt", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
        );
        try {
            $db->createTable('password_changes', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("usersId", array("usersId")),
                )
            ));
            $result = "Create Table Password Change Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function permissions($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("profilesId", array(
                "type"      => Column::TYPE_INTEGER,
                "size"      => 10,
                "notNull"   => true
            )),
            new Column("resource", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 16,
                "notNull"       => true
            )),
            new Column("action", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 16,
                "notNull"       => true
            )),
        );
        try {
            $db->createTable('permissions', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("profilesId", array("profilesId")),
                )
            ));
            $query = "INSERT INTO `permissions` VALUES ('1', '3', 'users', 'index'), ('2', '3', 'users', 'search'), ('3', '3', 'profiles', 'index'), ('4', '3', 'profiles', 'search'), ('36', '2', 'users', 'index'), ('37', '2', 'users', 'search'), ('38', '2', 'users', 'edit'), ('39', '2', 'users', 'create'), ('40', '2', 'users', 'delete'), ('41', '2', 'users', 'list'), ('42', '2', 'users', 'changePassword'), ('43', '2', 'profiles', 'index'), ('44', '2', 'profiles', 'search'), ('45', '2', 'profiles', 'edit'), ('46', '2', 'profiles', 'create'), ('47', '2', 'profiles', 'delete'), ('48', '2', 'permissions', 'index'), ('271', '1', 'users', 'index'), ('272', '1', 'users', 'search'), ('273', '1', 'users', 'edit'), ('274', '1', 'users', 'create'), ('275', '1', 'users', 'delete'), ('276', '1', 'users', 'list'), ('277', '1', 'users', 'get'), ('278', '1', 'users', 'changePassword'), ('279', '1', 'profiles', 'index'), ('280', '1', 'profiles', 'list'), ('281', '1', 'profiles', 'search'), ('282', '1', 'profiles', 'edit'), ('283', '1', 'profiles', 'create'), ('284', '1', 'profiles', 'get'), ('285', '1', 'profiles', 'delete'), ('286', '1', 'banner', 'index'), ('287', '1', 'banner', 'list'), ('288', '1', 'banner', 'search'), ('289', '1', 'banner', 'edit'), ('290', '1', 'banner', 'create'), ('291', '1', 'banner', 'get'), ('292', '1', 'banner', 'delete'), ('293', '1', 'gallery', 'index'), ('294', '1', 'gallery', 'list'), ('295', '1', 'gallery', 'search'), ('296', '1', 'gallery', 'edit'), ('297', '1', 'gallery', 'create'), ('298', '1', 'gallery', 'get'), ('299', '1', 'gallery', 'delete'), ('300', '1', 'gallery', 'imagelist'), ('301', '1', 'gallery', 'imagecreate'), ('302', '1', 'gallery', 'imageedit'), ('303', '1', 'gallery', 'imagedelete'), ('304', '1', 'program', 'index'), ('305', '1', 'program', 'list'), ('306', '1', 'program', 'search'), ('307', '1', 'program', 'location'), ('308', '1', 'program', 'edit'), ('309', '1', 'program', 'create'), ('310', '1', 'program', 'get'), ('311', '1', 'program', 'delete'), ('312', '1', 'program', 'download'), ('313', '1', 'service', 'index'), ('314', '1', 'service', 'list'), ('315', '1', 'service', 'search'), ('316', '1', 'service', 'edit'), ('317', '1', 'service', 'create'), ('318', '1', 'service', 'get'), ('319', '1', 'service', 'delete'), ('320', '1', 'blog', 'index'), ('321', '1', 'blog', 'list'), ('322', '1', 'blog', 'search'), ('323', '1', 'blog', 'edit'), ('324', '1', 'blog', 'create'), ('325', '1', 'blog', 'get'), ('326', '1', 'blog', 'delete'), ('327', '1', 'page', 'index'), ('328', '1', 'page', 'list'), ('329', '1', 'page', 'search'), ('330', '1', 'page', 'edit'), ('331', '1', 'page', 'create'), ('332', '1', 'page', 'get'), ('333', '1', 'page', 'delete'), ('334', '1', 'permissions', 'index');";
            $db->query($query);
            $result = "Create Table Permissions Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function profiles($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("name", array(
                "type"      => Column::TYPE_VARCHAR,
                "size"      => 64,
                "notNull"   => true,
    
            )),
            new Column("active", array(
                "type"      => Column::TYPE_CHAR,
                "size"      => 1,
                "notNull"   => true,
            )),
        );
        try {
            $db->createTable('profiles', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                )
            ));
            $query  = "INSERT INTO `profiles` (`id`, `name`, `active`) VALUES (1, 'Administrators', 'Y'),(2, 'Users', 'Y'),(3, 'Read-Only', 'Y');";
            $db->query($query);
            $result = "Create Table Profile Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function rememberTokens($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("usersId", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("token", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 32,
                "notNull"       => true,
            )),
            new Column("userAgent", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 120,
                "notNull"       => true,
            )),
            new Column("createdAt", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
        );
        try {
            $db->createTable('remember_tokens', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("token", array("token")),
                )
            ));
            $result = "Create Table remember_tokens Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function resetPasswords($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("usersId", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("code", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 48,
                "notNull"       => true,
            )),
            new Column("createdAt", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("modifiedAt", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("reset", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 1,
                "notNull"       => true,
            )),
        );
        try {
            $db->createTable('reset_passwords', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("usersId", array("usersId")),
                )
            ));
            $result = "Create Table reset_passwords Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function successLogins($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("usersId", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("ipAddress", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("userAgent", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 120,
                "notNull"       => true,
            )),
        );
        try {
            $db->createTable('success_logins', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index("usersId", array("usersId")),
                )
            ));
            $result = "Create Table success_logins Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
	}

	public static function users($db)
	{
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("name", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
            new Column("email", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
            new Column("password", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 60,
                "notNull"       => true
            )),
            new Column("mustChangePassword", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 1,
                "notNull"       => false,
            )),
            new Column("profilesId", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 10,
                "notNull"       => true,
            )),
            new Column("banned", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 1,
                "notNull"       => true,
            )),
            new Column("suspended", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 1,
                "notNull"       => true,
            )),
            new Column("active", array(
                "type"  => Column::TYPE_CHAR,
                "size"  => 1,
                "notNull"       => false,
            )),
        );
        try {
            $db->createTable('users', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id")),
                    new Index('profilesId', array('profilesId'))
                )
            ));
            $db->insert("users",
                ["Dwi Agus","admin@phalms.dev",'$2y$08$RDU3VXk3N2lsTldNU2hIe.kWm6qel0KrlXvD3BEF3EIAq6dt.p.Ai',"N","1","N",
                    "N","Y"],
                ["name","email","password","mustChangePassword","profilesId","banned","suspended","active"]
            );
            $result = "Create Table User Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
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

    public static function modules($db)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("name", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
            new Column("desc", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 500,
                "notNull"       => true,
            )),
            new Column("publish", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("created", array(
                "type"  => Column::TYPE_DATETIME,
                "notNull"       => false,
            )),
            new Column("updated", array(
                "type"  => Column::TYPE_DATETIME,
                "notNull"       => false,
            )),
        );
        try {
            $db->createTable('modules', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $result = "Create Table Modules Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
    }

    public static function menu($db)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column('name', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )),
            new Column('url', array(
                "type" => Column::TYPE_VARCHAR,
                "size" => 255,
                "notNull" => false,
            )),
            new Column('parrent', array(
                "type" => Column::TYPE_INTEGER,
                "size" => 11,
                "notNull" => false,
            )),
            new Column('sort', array(
                "type" => Column::TYPE_INTEGER,
                "size" => 11,
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
            )),
        );


        try{
            $db->createTable("menu", null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $result = "Created Table Menu in Database";
        }catch (\Exception $e){
            $result = $e->getMessage();
        }
        return $result;
    }

    public static function banner($db)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
                "autoIncrement" => true,
            )),
            new Column("order", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("file", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 555,
                "notNull"       => true,
            )),
            new Column("description", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 555,
                "notNull"       => true,
            )),
            new Column("description1", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 555,
                "notNull"       => true,
            )),
            new Column("link", array(
                "type"  => Column::TYPE_VARCHAR,
                "size"  => 255,
                "notNull"       => true,
            )),
            new Column("publish", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("create_user", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("update_user", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 11,
                "notNull"       => true,
            )),
            new Column("created", array(
                "type"  => Column::TYPE_DATETIME,
                "notNull"       => false,
            )),
            new Column("updated", array(
                "type"  => Column::TYPE_DATETIME,
                "notNull"       => false,
            )),
        );
        try {
            $db->createTable('banner', null, array(
                "columns" => $arr_column,
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ));
            $result = "Create Table Banner Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
    }

    public static function CreateTable($db)
    {
        $result = [
            "email_confirmations" => self::emailConfirmations($db),
            "failed_logins"     => self::failedLogins($db),
            "remember_tokens"   => self::rememberTokens($db),
            "reset_passwords"   => self::resetPasswords($db),
            "password_changes"  => self::passwordChanges($db),
            "success_logins"    => self::successLogins($db),
            "permissions"       => self::permissions($db),
            "banner"    => self::banner($db),
            "menu"      => self::menu($db),
            "modules"   => self::modules($db),
            "resources" => self::privateResource($db),
            "profiles"  => self::profiles($db),
            "users"     => self::users($db),
        ];
        return $result;
    }
}