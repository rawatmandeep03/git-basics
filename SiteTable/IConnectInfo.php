<?php
//Filename: IConnectInfo.php
interface IConnectInfo
{
	const HOST ="your_host";
	const UNAME ="your_username";
	const PW ="your_pw";
	const DBNAME = "your_dbname";
	public static function doConnect();
}
?>
