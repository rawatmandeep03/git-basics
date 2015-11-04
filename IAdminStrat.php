<?php
abstract class IAdminStrat
{
	abstract public function executeStrategy();
	protected $hookup, $sql, $tableMaster,$topic,$header, $graphic,$story,$id,$package;
	const ULTRA = "your_table_name";
}
?>