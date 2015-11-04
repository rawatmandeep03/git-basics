<?php
abstract class ILogin
{
	protected abstract function loginOrDie();
	public abstract function doLogin();
	protected $sun, $spw, $igor, $goodLog, $badLog;
	protected $security = array();
	protected $passSecurity=false;
	protected function setPass()
	{
		$aduser=base64_encode("a");
		$adcode=base64_encode("b");
		$enigma=array($aduser,$adcode);
		return $enigma;
	}
}
?>