<?php
class ReLog
{
    private $logUI;
    
    public function __construct()
    {
        //Use the Security object to encode table
        $this->logUI=<<<RELOG
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="sandlight.css">
            <meta charset="UTF-8">
            <title>Login</title>
        </head>
        <body>
        <form action="LoginClient.php" method="get">
        <h2 style="color:#c00">Your password and/or username are incorrect.</h2>
        Try again and remember login is case sensitive.<p />
        <fieldset class="fset"><legend>Login</legend>
            <input type="text" name="username" size="14">&nbsp; Username<br />
            <input type="password" name="password" size="14">&nbsp;Password &nbsp;
        </fieldset><br />
        <input type="submit" name ="login" value ="Click to Login">
        </form>
        </body>
        </html>
RELOG;
        echo $this->logUI;
    }
}
?>