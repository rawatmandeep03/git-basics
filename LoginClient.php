<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 1);
function includeAll($className)
{
    include_once($className . '.php');
}
spl_autoload_register('includeAll');

class LoginClient
{
    private static $login;
    //client request
    public static function request()
    {
      self::$login=new LoginProxy();
      self::$login->doLogin();
    }
}
LoginClient::request();
?>
