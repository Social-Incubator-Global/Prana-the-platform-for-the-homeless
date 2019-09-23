<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("./phpinclude/core/includer.php");
$includer->includes_contained(-1, false);

$content = $_GET['cnt'];
content_find($content);
?>
