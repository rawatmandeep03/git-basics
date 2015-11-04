<?php
class LoginProxy extends ILogin
{
	//Proxy Subject
	public function doLogin()
	{ 	
		$this->sun=$_GET['username'];
		unset($_GET['username']);
		$this->spw=$_GET['password'];
		unset($_GET['password']);
		
		try
		{
			$this->security=$this->setPass();
			$this->igor=$this->sun==base64_decode($this->security[0]) && $this->spw==base64_decode($this->security[1]);
			$lambda=function($x) {$alpha=$this->igor ? $this->passSecurity=true : NULL; return $alpha;};
			$lambda($this->igor);
			$this->loginOrDie();
		}

		catch(Exception $e)
		{
			echo "Here's what went wrong: " . $e->getMessage();
		}
	}
	
	protected function loginOrDie()
	{
		$badPass=function($x) {$delta= $x ? ($this->goodLog=new Login()) : ($this->badLog=new ReLog());};
		$badPass($this->passSecurity);
		$goodPass=function($x) {$tau= $x ? ($this->goodLog->doLogin()) : NULL;};
		$goodPass($this->passSecurity);
	}
}
?>