<?php

include("./phpinclude/core/includer.php");
php_includes();

$content = $_GET['cnt'];
content_find($content);
?>