<?php

include(DOC_ROOT . '/phpinclude/sql.php');
include(DOC_ROOT . '/phpinclude/functions.php');
include(DOC_ROOT . '/phpinclude/objects.php');
include(DOC_ROOT . '/phpinclude/content_functions.php');

$resu_ = get_filters_URL("home");

class Page
{
	function show($renderer)
	{
		//Render the views/welcome.blade.php file
		return $renderer->render('pages.home', []);
	}
}
