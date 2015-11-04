<?php
include_once('IConnectInfo.php');
include_once('UniversalConnect.php');
class CreateTable
{
	private $drop;
	
	public function __construct()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->tableMaster="your_table_name";
		$this->dropTable();
		$this->makeTable();
		$this->hookup->close();	
	}
	
	private function dropTable()
	{
		$this->drop = "DROP TABLE IF EXISTS $this->tableMaster";
	
		try
		{
			$this->hookup->query($this->drop) === true;
			printf("Old table %s has been dropped.<br/>",$this->tableMaster);
		}
		catch (Exception $e)
		{
			echo "Here is why it did not work:  $e->getMessage() <br />";
		}
	}
	
	protected function makeTable()
	{
		$this->sql = "CREATE TABLE $this->tableMaster (
			id INT NOT NULL AUTO_INCREMENT,
			topic NVARCHAR(24),
			header NVARCHAR(120),
			graphic NVARCHAR(60),
			story BLOB,
			PRIMARY KEY (id))";
		try
		{
		  $this->hookup->query($this->sql);
		
		}
		 catch (Exception $e)
		{
			echo 'Here is why it did not work: ',  $e->getMessage(), "<br />";
		}
		echo "Table $this->tableMaster has been created successfully.<br/>";
	}
}

$worker=new CreateTable();
?>
