<?php
class AdminEdit extends IAdminStrat
{
	//This is a Strategy implementation
	public function executeStrategy()
	{
	    //Get table name and make connection
        $this->tableMaster=IAdminStrat::ULTRA;
	    $this->hookup=UniversalConnect::doConnect();
		//Get data from HTML entry
		$this->id=$_POST['record'];
		$this->topic=$_POST['topic'];
		unset ($_POST['topic']);
		$this->header=$_POST['header'];
		unset ($_POST['header']);
		$this->graphic=$this->topic . ".jpg";
		$this->story=$_POST['textNow'];
		unset ($_POST['textNow']);
	    $this->updateData();
	    $this->hookup->close();	
	}
 

	private function updateData()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->sql = "UPDATE  $this->tableMaster
				SET topic='$this->topic',
				header='$this->header',
				graphic='$this->graphic',
				story='$this->story'
				WHERE id='$this->id'";	  
 
		try
		{	
			$this->hookup->query($this->sql);
			printf("Story with topic, %s and header %s and %s graphic has been updated in table, %s :",$this->topic,$this->header,$this->graphic,$this->tableMaster);
		}
 
		catch (Exception $e)
		{
			echo "There is a problem: " . $e->getMessage();
			exit();
		}
	}
}
?>
