<?php
class Login extends ILogin
{
	//Real Subject
	public function doLogin()
	{ 
		$this->loginOrDie();
	}
	
	protected function loginOrDie()
	{
		$admin=new AdminUI();
		$admin->dataStrat();
	}
}
?>