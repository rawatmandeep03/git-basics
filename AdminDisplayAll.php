<?php
class AdminDisplayAll extends IAdminStrat
{
	public function executeStrategy()
	{
	    //Get table name and make connection
        $this->tableMaster=IAdminStrat::ULTRA;
	    $this->hookup=UniversalConnect::doConnect();
	    $this->displayAll();
	    $this->hookup->close();	
	}
 
	private function displayAll()
	{
        //Create Query Statement
	    $this->sql ="SELECT * FROM $this->tableMaster";
 
	    try
	    {
			$result = $this->hookup->query($this->sql);
			printf("This table has %s records.",mysqli_num_rows($result));
			while ($row = $result->fetch_assoc()) 
			{
				printf("<br />ID: %s  Topic: %s<br/> Header: %s Graphic:%s <br /> Story: %s <br />",$row['id'], $row['topic'],$row['header'],$row['graphic'],$row['story']);
			}
 
			$result->close();
	    }
	    catch(Exception $e)
	    {
			echo "Here's what went wrong: " . $e->getMessage();
			exit();
	    }
	}
}
?>