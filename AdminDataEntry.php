<?php
class AdminDataEntry extends IAdminStrat
{
	//This is a Strategy implementation
	public function executeStrategy()
	{ 
		//Get data from HTML entry
		$this->topic=$_POST['topic'];
		unset ($_POST['topic']);
		$this->header=$_POST['header'];
		unset ($_POST['header']);
		$this->graphic=$this->topic . ".jpg";
		$this->story=$_POST['textNow'];
		unset ($_POST['textNow']);
		$this->enterData();
		$this->hookup->close();
	}
	private function enterData()
	{
		$this->tableMaster=IAdminStrat::ULTRA;
		$this->hookup=UniversalConnect::doConnect();
		$this->sql = "INSERT INTO $this->tableMaster (topic,header,graphic,story)
					  VALUES ('$this->topic','$this->header', '$this->graphic','$this->story')";
 
		try
		{	
			$this->hookup->query($this->sql);
			printf("Story with topic, %s and header %s and %s graphic has been entered into table, %s :",$this->topic,$this->header,$this->graphic,$this->tableMaster);
		}
 
		catch (Exception $e)
		{
			echo "There is a problem: " . $e->getMessage();
			exit();
		}
	}
}
?>