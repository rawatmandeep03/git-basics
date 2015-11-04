<?php
include_once "UniversalConnect.php";
include_once "IAdminStrat.php";
class AdminPreview extends IAdminStrat
{
	//Variable for MySql connection
	private $page=array();
	public function executeStrategy()
	{
	    //Get table name and make connection
        $this->tableMaster=IAdminStrat::ULTRA;
	    $this->hookup=UniversalConnect::doConnect();
	    $this->getLastRecord();
		$this->page=$this->getPage();
	    $this->hookup->close();
		return $this->page;
		
	}
 
	private function getLastRecord()
	{
        //Create Query Statement
	    $this->sql ="SELECT * FROM $this->tableMaster";
	    try
	    {
			$result = $this->hookup->query($this->sql);
			$this->id=mysqli_num_rows($result);
			$result->close();
	    }
	    catch(Exception $e)
	    {
			echo "Here's what went wrong: " . $e->getMessage();
			exit();
	    }
	}
	
	private function getPage()
	{
        //Create Query Statement
	    $this->sql ="SELECT * FROM $this->tableMaster WHERE id='$this->id'";
	    try
	    {
			$result = $this->hookup->query($this->sql);
			while ($row = $result->fetch_assoc()) 
			{
				$this->header=$row['header'];
				$this->graphic=$row['graphic'];
				$this->story=$row['story'];
			}
			$result->close();
			$this->package=array($this->header,$this->graphic,$this->story);
			return $this->package;	
	    }
	    catch(Exception $e)
	    {
			echo "Here's what went wrong: " . $e->getMessage();
			exit();
	    }
	}
}
?>