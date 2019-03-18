<?php

function draw_html($file)
{
	$html = file_get_contents($file);
	echo($html);
	return;
}

function draw_html_to_body($file)
{	
	$html = file_get_contents($file);
	echo("<script>document.body.innerHTML += '".$html."';</script>");
}

function draw_html_inside($file, $control)
{
	$html = file_get_contents($file);
	echo("<script>document.getElementById('".$control."').innerHTML += '".$html."';</script>");
	return;
}

function draw_html_inside_ov($file, $control)
{
	$html = file_get_contents($file);
	echo("<script>document.getElementById('".$control."').innerHTML = '".$html."';</script>");
	return;
}

function draw_html_conditional($file, $control, $condition)
{
	echo "<script>console.log('".$condition."');</script>";
    if($condition)
    {
	    $html = file_get_contents($file);
        echo("<script>document.getElementById('".$control."').innerHTML += '".$html."';</script>");
    }
	return;
}

function draw_html_raw($HTML, $control)
{
	echo("<script>document.getElementById('".$control."').innerHTML += '".$HTML."';</script>");
	return;
}

function draw_html_property($HTML, $control, $property)
{
	echo("<script>document.getElementById('".$control."').".$property." += ".$HTML.";</script>");
	return;
}

?>