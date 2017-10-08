<?php

require __DIR__ . '/config.php';
require __DIR__ . '/helpers.php';
require __DIR__ . '/vendor/autoload.php';

use Windwalker\Renderer\BladeRenderer;

//Init Blade renderer
$paths = array(__DIR__ . '/views');
$renderer = new BladeRenderer($paths, array('cache_path' => __DIR__ . '/cache'));

//Load page based on uri
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$start_position = strrpos($url, '/') + 1;
$stop_positon = strrpos($url, '?');
$sub_len = $stop_positon - $start_position;
if(strrpos($url, '?')) {
	$path = substr($url, $start_position, $sub_len);
} else {
	$path = substr($url, $start_position);
}
if (empty($path)) {
	$path = "home";
}
require __DIR__ . '/pages/' . $path . '.php';

//Render page
$page = new Page();
echo $page->show($renderer);
