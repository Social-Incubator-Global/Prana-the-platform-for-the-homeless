<?php

function content_find($content)
{
    echo('console.log("hhh");');
    if($content == "parent")
    {
        //$result = sql_get_all("content_parent");
        sql_module_test();
        return;
    }

    return;
}
?>