<?php
class AdminUI2
{
	//Administration UI
	private $adminUI,$header,$graphic,$story;
	private $pageData=array();
	public function dataStrat()
	{ 
		//Elvis operator ?:  
		$tester=isset($_GET['preview']) ?: NULL;
		if($tester)
		{
			unset($_GET['preview']);
			$preview=new AdminPreview();
			$this->pageData=$preview->executeStrategy();
			$this->header=$this->pageData[0];
			$this->graphic=$this->pageData[1];
			$this->story=$this->pageData[2];
		}
		else
		{
			$this->header="Header";
			$this->graphic="holder.jpg";
			$this->story ="&nbsp; Story";
		}
		$this->dataWork();
	}
	
	private function dataWork()
	{
		$this->adminUI=<<<ADMINUI2
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="sandlight.css">
    <title>Admin Edit</title>
</head>

<body>
	<div class="section group">
			<div class="col spanner">
<h2>Edit Administrative Data</h2>
        <form action="AdminClient.php" method="post" target="showdata2">
        <fieldset ><legend>Data Update</legend>
		Record Number to Edit :&nbsp;
			<input name="record" type="text" size="6"><br />
			Topic<br />
			<select name="topic" size="4">
				<option value="tip" selected="true">Programming Tip</option>
				<option value="despat">PHP Design Patterns</option>
				<option value="fun">Functional Programming</option>
				<option value="lambda">&#x3BB; Calculus</option>
			</select><br />
            <input type="text" name="header" size="40">&nbsp; Header<br />
			Write-up
			<textarea name ="textNow" cols="50" rows="40"></textarea>
        </fieldset><br />
        <input type="submit" name ="edit" value ="Click to Update Data">
        </form>
		<form action="AdminClient.php" method="get" target="showdata2">
		<input type="submit" name ="display" value ="Display All Data" >
		</form>
		<form action="AdminTrigger.php" method="get">
		<input type="submit" name ="entry" value ="Return to Data Entry" >
		</form>
		<br />
		<fieldset ><legend>Data Display</legend>
			<iframe style="background-color: #DBE3C7" name="showdata2">showdata2</iframe>
		</fieldset>
			</div>
		<div class="col spanner">
			<h2>$this->header</h2><br />
			<img src="images/$this->graphic" alt="graphic" align="left">
			$this->story<br />
		</div>
</body>
</html>
ADMINUI2;
	echo $this->adminUI;
	}
}
?>