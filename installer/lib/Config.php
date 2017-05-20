<?php  
namespace Phalms\Installer;
/**
* 
*/
class Config
{
	
	public static function write($input)
	{
		if(file_exists(APP_PATH . "/config/config.db.php")){
			unlink(APP_PATH . "/config/config.db.php");
		}
		copy(BASE_PATH."/installer/src/db.php", APP_PATH."/config/config.db.php");
		$filedestination = APP_PATH . "/config/config.db.php";
		$info 	= array(
			'_URL_'			=> $input['siteurl'],
			'_SITENAME_'	=> $input['sitename'],
			'_ADAPTER_' 	=> $input['dbadapter'], 
			'_HOST_'		=> $input['dbserver'],
			'_USERNAME_'	=> $input['dbusername'],
			'_PASSWORD_'	=> $input['dbpassword'],
			'_DBNAME_'		=> $input['dbname'],
			'_EMAIL_'		=> $input['emailaddress'],
			'_SMTPSERVER_'	=> $input['emailserver'],
			'_SMTPUSER_'	=> $input['emailuser'],
			'_SMTPPASS_'	=> $input['emailpass'],
			); 
		$current = file_get_contents($filedestination);

        $current = self::str_replace_assoc($info, $current);

        file_put_contents($filedestination, $current);
	}

	public static function str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }


}