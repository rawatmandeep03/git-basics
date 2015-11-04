<?php
class AdminContext
{
    private $adminStrat;
 
    public function adminInterface(IAdminStrat $strategy)
    {
        $this->adminStrat=$strategy;
		$this->adminStrat->executeStrategy();
    }
}
?>