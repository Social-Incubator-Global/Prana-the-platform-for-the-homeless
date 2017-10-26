<!--
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Catie Carson, Nicholas Alexander Kearney, Jeremy Leresteux, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe, Nicholas Alexander Kearney, Jeremy Leresteux>

    Visitable link: www.prana-deutschland.de , for any inquiries contact at contact@prana-deutschland.de

    This file is part of Prana-deutschland.

    Prana-deutschland is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Prana-deutschland is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Prana-deutschland.  If not, see <http://www.gnu.org/licenses/>.
-->
<?php error_reporting(0);?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana Deutschland</title>
<head bgcolor="white">
<?php include '../partials/_css.php'; ?>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/Mainstyle.css"/>
<link rel="stylesheet" href="../css/content.css"/>

<?php include '../partials/_js.php' ?>
<script src="../js/Objects.js"></script>
<script src="../js/forms.js"></script>
<script src="../js/session.js"></script>
<script src="../js/maps_functions.js"></script>
<!--Variables-->
<script>
set_location("content");
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
var ID = localStorage.getItem("ID");
var home_type = localStorage.getItem("home_type");
var sql_ = localStorage.getItem("sql_");
</script>
<?php
//GODADDY
//include('/home/otark/public_html/phpinclude/content_functions.php');
//NEW
include('../phpinclude/content_functions.php');
include('../phpinclude/sql.php');
include('../phpinclude/functions.php');
include('../phpinclude/objects.php');
get_languages();
load_languages_ToArrays("");
$resu_ = get_filters_URL("basic");
apply_language($resu_[3]);
load_organizations();?>
</head>
<body>
<!--SESSION VARIABLES-->
<script>
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
var home_type = localStorage.getItem("home_type");
var paid_type = localStorage.getItem("paid_type");
var view_type = localStorage.getItem("view_type");
var area = localStorage.getItem("area");
</script>
<script>
top_menu('content');
</script>
<script>menu_home_type();</script><br>
