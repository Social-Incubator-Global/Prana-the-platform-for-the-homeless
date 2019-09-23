<?php
$sqlconnect;
$instantiator = new Instantiator;
$javascript;

class Instantiator
{
    function instantiate()
    {
        global $sqlconnect, $javascript;
        //NOTES:
        //$includer = new Includer; DEFINED IN: includer.php
        //--------------------------------------------------
        $sqlconnect = new Sqlconnect;
        $javascript = new Javascript;
        return;
    }
}
?>

