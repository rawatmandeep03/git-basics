<?php
include_once "../Admin/AdminTrigger";
class AdminUI
{
	//Administration UI
	private $adminUI;
	public function dataStrat()
	{ 
		$this->dataWork();
	}
	
	protected function dataWork()
	{
		$this->adminUI=<<<ADMINUI
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="sandlight.css">
            <meta charset="UTF-8">
            <title>Administration UI</title>
        </head>
        <body>
        <h2>Administrative Data Entry</h2>
        <form action="AdminClient.php" method="post" target="showdata">
        <fieldset ><legend>Data Entry</legend>
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
        <input type="submit" name ="insert" value ="Click to Insert Data">
        </form>
		<!--Display All Data -->
		<form action="AdminClient.php" method="get" target="showdata">
		<input type="submit" name ="display" value ="Display All Data" >
		</form>
		<!--Go to AdminUI2: Change UI -->
		<form action="AdminTrigger.php" method="get">
		<input type="submit" name ="edit" value ="Edit a Page" >
		</form>
		<!--Go to AdminUI: Change UI -->
		<form action="AdminTrigger.php" method="get">
		<input type="submit" name ="preview" value ="Preview Dynamic Page Section" >
		</form>
		<br /><br />
		<fieldset ><legend>Data Display</legend>
			<iframe name="showdata">showdata</iframe>
		</fieldset>
        </body>
        </html>
ADMINUI;
        echo $this->adminUI;
	}
}
?>