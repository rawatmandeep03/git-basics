<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 1);
// Autoload given function name.
function includeAll($className)
{
    include_once($className . '.php');
}
spl_autoload_register('includeAll');

class AdminClient
{
    private static $a,$b,$c,$d;
	//client request
    public static function request()
    {	
		self::$a=isset($_POST["insert"]);
		self::$b=isset($_GET["display"]);
		self::$c=isset($_POST["edit"]);
		self::$d=isset($_GET["preview"]);
		
		//Use closures to determine course of action
		$kappa=function() {$gamma= self::$c ? 'AdminEdit' : 'AdminPreview';
				return $gamma;};
		$iota = function() use($kappa) {$beta=self::$b ? 'AdminDisplayAll' : $kappa();
				return $beta;};
		$lambda = function($x) use ($kappa, $iota) {
				$alpha =  $x  ? 'AdminDataEntry' : $iota();
				return $alpha;};
		self::clearSet();
		$clas=$lambda(self::$a);
		$job = new $clas();
		$context=new AdminContext();
		$context->adminInterface($job);
    }
	
	private static function clearSet()
	{
		unset($_POST["insert"]);
		unset($_GET["display"]);
		unset($_POST["edit"]);
		unset($_GET["preview"]);
	}
}
AdminClient::request();
?>

