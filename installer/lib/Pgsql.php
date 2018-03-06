<?php
namespace Phalms\Installer;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
/**
* 
*/
class Pgsql
{
	
	public static function emailConfirmations($db)
	{
		$arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_BIGINTEGER,
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
            $db->createTable('email_confirmations', null, 
            	["columns" => $arr_column ,
            	"indexes"  => [new Index('email_confirmations_pkey', ['id'], 'PRIMARY KEY')]
            ]);
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('failed_logins_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('failed_logins_usersId', ['usersId']),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('password_changes_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('password_changes_usersId', ['usersId']),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('permissions_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('permissions_profilesId', ['profilesId']),
                )
            ));
            $query = "INSERT INTO permissions VALUES (1, 1, 'permissions', 'index'),(2, 1, 'users', 'index'),(3, 1, 'users', 'search'),(4, 1, 'users', 'edit'),(5, 1, 'users', 'create'),(6, 1, 'users', 'delete'),(7, 1, 'users', 'list'),(8, 1, 'users', 'get'),(9, 1, 'users', 'changePassword'),(10, 1, 'profiles', 'index'),(11, 1, 'profiles', 'list'),(12, 1, 'profiles', 'search'),(13, 1, 'profiles', 'edit'),(14, 1, 'profiles', 'create'),(15, 1, 'profiles', 'get'),(16, 1, 'profiles', 'delete'),(17, 1, 'banner', 'index'),(18, 1, 'banner', 'list'),(19, 1, 'banner', 'search'),(20, 1, 'banner', 'edit'),(21, 1, 'banner', 'create'),(22, 1, 'banner', 'get'),(23, 1, 'banner', 'delete'),(24, 1, 'gallery', 'index'),(25, 1, 'gallery', 'list'),(26, 1, 'gallery', 'search'),(27, 1, 'gallery', 'edit'),(28, 1, 'gallery', 'create'),(29, 1, 'gallery', 'get'),(30, 1, 'gallery', 'gallery'),(31, 1, 'gallery', 'delete'),(32, 1, 'gallery', 'image'),(33, 1, 'gallery', 'imagelist'),(34, 1, 'gallery', 'imagecreate'),(35, 1, 'gallery', 'imageedit'),(36, 1, 'gallery', 'imagedelete'),(37, 1, 'blog', 'index'),(38, 1, 'blog', 'list'),(39, 1, 'blog', 'search'),(40, 1, 'blog', 'edit'),(41, 1, 'blog', 'create'),(42, 1, 'blog', 'get'),(43, 1, 'blog', 'delete'),(44, 1, 'page', 'index'),(45, 1, 'page', 'list'),(46, 1, 'page', 'search'),(47, 1, 'page', 'edit'),(48, 1, 'page', 'create'),(49, 1, 'page', 'get'),(50, 1, 'page', 'delete');";
            $db->query($query);
            $db->query("ALTER SEQUENCE permissions_id_seq RESTART WITH 51");
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('profiles_pkey', ['id'], 'PRIMARY KEY'),
                )
            ));
            $query  = "INSERT INTO profiles (id, name, active) VALUES (1, 'Administrators', 'Y'),(2, 'Users', 'Y'),(3, 'Read-Only', 'Y');";
            $db->query($query);
            $db->query("ALTER SEQUENCE profiles_id_seq RESTART WITH 4");
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('remember_tokens_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('remember_tokens_usersId', ['usersId']),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('reset_passwords_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('reset_passwords_usersId', ['usersId']),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('success_logins_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('success_logins_usersId', ['usersId']),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('users_pkey', ['id'], 'PRIMARY KEY'),
                	new Index('users_profilesId', ['profilesId']),
                )
            ));
            $db->insert("users",
                ["Dwi Agus","admin@phalms.dev",'$2y$08$RDU3VXk3N2lsTldNU2hIe.kWm6qel0KrlXvD3BEF3EIAq6dt.p.Ai',"N","1","N",
                    "N","Y"],
                ["name","email","password","mustChangePassword","profilesId","banned","suspended","active"]
            );
            $db->query("ALTER SEQUENCE users_id_seq RESTART WITH 2");
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('resource_pkey', ['id'], 'PRIMARY KEY'),
                )
            ));
            $query = "INSERT INTO resource VALUES ('1', 'banner', 'index'), ('2', 'banner', 'list'), ('3', 'banner', 'edit'), ('4', 'banner', 'get'), ('5', 'banner', 'create'), ('6', 'banner', 'delete'), ('7', 'blog_category', 'index'), ('8', 'blog_category', 'all'), ('9', 'blog_category', 'list'), ('10', 'blog_category', 'create'), ('11', 'blog_category', 'edit'), ('12', 'blog_category', 'delete'), ('13', 'blog', 'index'), ('14', 'blog', 'list'), ('15', 'blog', 'create'), ('16', 'blog', 'edit'), ('17', 'blog', 'get'), ('18', 'blog', 'delete'), ('19', 'page_category', 'index'), ('20', 'page_category', 'all'), ('21', 'page_category', 'list'), ('22', 'page_category', 'create'), ('23', 'page_category', 'edit'), ('24', 'page_category', 'delete'), ('25', 'page', 'index'), ('26', 'page', 'list'), ('27', 'page', 'create'), ('28', 'page', 'edit'), ('29', 'page', 'get'), ('30', 'page', 'delete'), ('31', 'base', 'index'), ('46', 'gallery', 'list'), ('47', 'gallery', 'imagelist'), ('48', 'gallery', 'index'), ('49', 'gallery', 'gallery'), ('50', 'gallery', 'image'), ('51', 'gallery', 'imagecreate'), ('52', 'gallery', 'imageedit'), ('53', 'gallery', 'imagedelete'), ('54', 'gallery', 'get'), ('55', 'gallery', 'create'), ('56', 'gallery', 'edit'), ('57', 'gallery', 'delete'), ('58', 'gallery', 'index'), ('59', 'generator', 'index'), ('66', 'menu', 'index'), ('67', 'menu', 'list'), ('68', 'menu', 'create'), ('69', 'menu', 'edit'), ('70', 'menu', 'get'), ('71', 'menu', 'delete'), ('72', 'modules', 'index'), ('73', 'modules', 'list'), ('74', 'modules', 'edit'), ('75', 'modules', 'get'), ('76', 'modules', 'delete'), ('82', 'permissions', 'index'), ('83', 'profiles', 'index'), ('84', 'profiles', 'list'), ('85', 'profiles', 'search'), ('86', 'profiles', 'create'), ('87', 'profiles', 'edit'), ('88', 'profiles', 'delete'), ('92', 'users', 'index'), ('93', 'users', 'list'), ('94', 'users', 'create'), ('95', 'users', 'get'), ('96', 'users', 'edit'), ('97', 'users', 'delete'), ('98', 'users', 'changePassword');";
            $db->execute($query);
            $db->query("ALTER SEQUENCE resource_id_seq RESTART WITH 99");
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
                "type"  => Column::TYPE_BIGINTEGER,
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
            new Column("is_core", array(
                "type"  => Column::TYPE_INTEGER,
                "size"  => 2,
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
                	new Index('modules_pkey', ['id'], 'PRIMARY KEY'),
                )
            ));
            $result = "Create Table Modules Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    public static function menu($db)
    {
        $arr_column = array(
            new Column("id", array(
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('menu_pkey', ['id'], 'PRIMARY KEY'),
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
                "type"  => Column::TYPE_BIGINTEGER,
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
                	new Index('banner_pkey', ['id'], 'PRIMARY KEY'),
                )
            ));
            $result = "Create Table Banner Success";
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
}