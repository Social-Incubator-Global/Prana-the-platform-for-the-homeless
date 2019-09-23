<?php
$includer = new Includer;
$includer_objects = new Includerobjects;

class Includerobjects
{
	function get_objects()
	{
		//ACTS AS AN OBJECT CONFIG FOR INCLUDER.php
		$phppaths = array("phpinclude/modules/*.php", "phpinclude/gui_modules/*.php");
		$jspaths = array("jsinclude/core/*.js", "jsinclude/modules/*.js");
		$csspaths = array("cssinclude/*.css", "cssinclude/iframe/*.css");
		$htmlpaths = array("htmlinclude/*.html");
		$base_concat = "./";
		//$fonts = array();
		$fonts_google = array("Reenie+Beanie", "Lato", "Courgette", "Mukta+Mahee");
		$fav_ico = "favico.png";
		$encoding = "utf-8";
		$viewport = "width=device-width, initial-scale=1.0";
		$description = "Find Housing, Shelters, Food, Medical & Sanitary care, Emergency services, Legal advice, Jobs, Study programmes or find a project to volunteer in, places to donate.";
		$title = "Prana - Your companion";
		$containerpaths = array("cssinclude/container_page/*.css", $csspaths[1]);
		return array($base_concat, $phppaths, $jspaths, $csspaths, $htmlpaths, $fonts_google, $fav_ico, $encoding, $viewport, $description, $title, $containerpaths);
	}
}

class Includer
{
    function include_service($request_type, $concatenation_level, $parameters)
    {
        global $ajaxobj, $includer_objects;
        include_once($this->create_concatenation($concatenation_level, $includer_objects->get_objects()[0])."phpinclude/services/service_".$ajaxobj->ajax_obj_redirect($request_type).".php");
        //all classes must have a default class called service in order to be called.
        $service = new Service($parameters);
    }

    function create_concatenation($concatenation_level, $base_concat)
    {
        if($concatenation_level != 0 && $concatenation_level != -1)
        {
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
		else
			return $base_concat;
    }

    function includes_selective($concatenation_level, $directory, $excludes)
    {
        $concat = "./";
        $concat = $this->create_concatenation($concatenation_level, $concat);

        foreach(glob($directory) as $filename)
        {
            include($filename);
        }
        return;
    }

	//FUNCTION USED TO INCLUDE BASIC FILES FOR DISPLAYING CONTAINED FILES IN IFRAMES
	function includes_container($concatenation_level)
	{
		global $includer_objects;
		$objects = $includer_objects->get_objects();
		$objects[0] = $this->create_concatenation($concatenation_level, $objects[0]);
		
		//Only includes base CSS files
		foreach ($objects[11] as $path)
		{
			foreach(glob($objects[0].$path) as $filename)
			{
				echo "<link rel='stylesheet' href='".$filename."'/>";
			}
		}
		
		$this->include_encoding($objects[7]);
		$this->include_viewport($objects[8]);
		$this->include_google_fonts($objects[5]);
		$this->include_fav_ico($objects[0] ,$objects[6]);
		$this->include_description($objects[9]);
		$this->include_title($objects[10]);
		
		return;
	}
	
	function includes_contained($concatenation_level, $set_jc_lc)
	{
		//Takes: int = 0 = ./ = 1 = ../ = 2 = ../../ etc...
		global $instantiator, $javascript, $includer_objects;
		$objects = $includer_objects->get_objects();
		$objects[0] = $this->create_concatenation($concatenation_level, $objects[0]);
    
		foreach ($objects[1] as $path)
		{
			foreach(glob($objects[0].$path) as $filename)
			{
				include($filename);
			}
		}

		//Instantiate php classes to continue
		$instantiator->instantiate();
		global $javascript;
    
		foreach ($objects[2] as $path)
		{
			foreach(glob($objects[0].$path) as $filename)
			{
				$javascript->js_include($filename);
			}
		}

		if($concatenation_level != -1)
		{
			foreach(glob($objects[0]."cssinclude/*.css") as $filename)
			{
				echo "<link rel='stylesheet' href='".$filename."'/>";
			}
		}
		else
		{
			foreach(glob($objects[0]."cssinclude/iframe/*.css") as $filename)
			{
				echo "<link rel='stylesheet' href='".$filename."'/>";
			}
		}

		$this->include_project($objects[0]);
		$this->include_encoding($objects[7]);
		$this->include_viewport($objects[8]);
		$this->include_google_fonts($objects[5]);
		$this->include_fav_ico($objects[0] ,$objects[6]);
		$this->include_description($objects[9]);
		$this->include_title($objects[10]);
		
		//Setup path for AJAX in JS
		if($set_jc_lc)
			$javascript->js_lc($concatenation_level);
		return;
	}

	function include_fav_ico($concat, $ico)
	{
		echo '<link rel="shortcut icon" type="image/png" href="'.$concat.'Assets/Images/icons/fav/'.$ico.'"/>';
		return;
	}

	function include_google_fonts($fonts)
	{
		foreach($fonts as $font)
			echo '<link href="https://fonts.googleapis.com/css?family='.$font.'" rel="stylesheet">';
		return;
	}

	function include_project($concat)
	{
		//Datetime.js
		echo "<script src='".$concat."packages/Datejs-master/build/date-de-DE.js'></script>";
		//HERE MAPS
		echo '<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1533195059" />';
		echo '<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>';
		echo '<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>';
		echo '<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>';
		echo '<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>';

		echo "<script src='".$concat."packages/jquery/jquery-3.3.1.min.js'></script>";
		echo "<script src='".$concat."packages/moment/moment.js'></script>";
		return;
	}

	function include_encoding($encoding)
	{
		echo '<meta http-equiv="Content-Type" content="text/html; charset='.$encoding.'" />';
		return;
	}

	function include_viewport($viewport)
	{
		echo '<meta name="viewport" content="'.$viewport.'">';
		return;
	}
	
	function include_description($description)
	{
		echo '<meta name="description" content="'.$description.'">';
		return;
	}
	
	function include_trackers($trackers)
	{
		//foreach
	}
	
	function include_title($title)
	{
		echo('<title>'.$title.'</title>');
	}

	function includes_custom($concatenation_level, $include_basepath)
	{
		$concat = "./";
		if($concatenation_level != 0)
		{
			$concat = $this->create_concatenation($concatenation_level, $concat);
		}

		$concat = $this->create_concatenation($concatenation_level);
		$final_path = $concat.$include_basepath;

		foreach(glob($final_path) as $filename)
		{
			include_once($filename);
		}
		return;
	}
}
?>
