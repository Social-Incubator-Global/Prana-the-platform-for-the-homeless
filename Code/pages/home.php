<?php
class Page
{
	function show($renderer)
	{
		//Render the views/welcome.blade.php file
		return $renderer->render('pages.home', []);
	}
}
