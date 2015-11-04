<?php
function includeAll($className)
{
    include_once($className . '.php');
}
spl_autoload_register('includeAll');

class AdminTrigger
{
    private static $transfer;
    public static function makeSwitch()
    {   
        self::$transfer=(isset($_GET['edit']) || isset($_GET['preview'])) ? 'AdminUI2':'AdminUI';
        self::doUnset();
        $move=new self::$transfer();
        $move->dataStrat();
    }
    
    private static function doUnset()
    {
        unset($_GET['edit']);
        unset($_GET['entry']);
    }
}
AdminTrigger::makeSwitch();
?>