<?php

function php_includes()
{
    $concat = "./";
    $final_path = $concat."phpinclude/modules/*.php";
    foreach(glob($final_path) as $filename)
    {
        include($filename);
    }

    $final_path = $concat."phpinclude/gui_modules/*.php";
    foreach(glob($final_path) as $filename)
    {
        include($filename);
    }
    return;
}

function includes($concatenation_level)
{
    //Takes: int
    $concat = "./";
    if($concatenation_level != 0 && $concatenation_level != -1)
    {
        $concat = create_concatenation($concatenation_level);
    }

    $final_path = $concat."phpinclude/modules/*.php";
    foreach(glob($final_path) as $filename)
    {
        include($filename);
    }

    $final_path = $concat."phpinclude/gui_modules/*.php";
    foreach(glob($final_path) as $filename)
    {
        include($filename);
    }

    $final_path = $concat."jsinclude/core/*.js";
    foreach(glob($final_path) as $filename)
    {
        echo "<script src=".$filename."></script>";
    }

    $final_path = $concat."jsinclude/modules/*.js";
    foreach(glob($final_path) as $filename)
    {
        echo "<script src=".$filename."></script>";
    }

    if($concatenation_level != -1)
    {
        $final_path = $concat."cssinclude/*.css";

        foreach(glob($final_path) as $filename)
        {
            echo "<link rel='stylesheet' href='".$filename."'/>";
        }
    }
    else
    {
        $final_path = $concat."cssinclude/iframe/*.css";

        foreach(glob($final_path) as $filename)
        {
            echo "<link rel='stylesheet' href='".$filename."'/>";
        }
    }
    return;
}

function create_concatenation($concatenation_level)
{
    //Takes: int

    $int = (int)$concatenation_level;
    $concatenation = "";
    $intup = 0;

    while($intup < $int)
    {
        $concatenation = $concatenation."../";
        $intup++;
    }
    return $concatenation;
}

function includes_custom($concatenation_level, $include_basepath)
{
    $concat = "./";
    if($concatenation_level != 0)
    {
        $concat = create_concatenation($concatenation_level);
    }

    $concat = create_concatenation($concatenation_level);
    $final_path = $concat.$include_basepath;

    foreach(glob($final_path) as $filename)
    {
        include($filename);
    }
    return;
}

?>