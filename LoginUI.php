<?php
function includeAll($className)
{
    include_once($className . '.php');
}
spl_autoload_register('includeAll');

class LoginUI
{
    private $logUI;
    public function makeLogin()
    {
        $this->logUI=<<<LOGIN
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="sandlight.css">
            <meta charset="UTF-8">
            <title>Login</title>
        </head>
        <body>
        <h2>Administrative Site Update</h2>
        <form action="LoginClient.php" method="get">
        <fieldset ><legend>Login</legend>
            <input type="text" name="username" size="14">&nbsp; Username<br />
            <input type="password" name="password" size="14">&nbsp;Password &nbsp;
        </fieldset><br />
        <input type="submit" name ="login" value ="Click to Login">
        </form>
        </body>
        </html>
LOGIN;
        echo $this->logUI;
    }
}
$worker=new LoginUI();
$worker->makeLogin();
?>