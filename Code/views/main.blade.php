
<!--
    <Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe>

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
<?php session_start(); error_reporting(0);?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana Deutschland</title>

<head bgcolor="white">
    <?php include '../partials/_css.php' ?>
    <link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/Mainstyle.css"/>
    <link rel="stylesheet" href="../css/home.css"/>

    <?php include '../partials/_js.php' ?>
    <script src="../js/objects.js"></script>
    <script src="../js/forms.js"></script>
    <script src="../js/session.js"></script>


    <!--Variables-->
    <script>
    load_localstorage();
    localStorage.setItem("session_vars_resume", 1);
    var session = localStorage.getItem("session");
    var uname = localStorage.getItem("uname");
    var ID = localStorage.getItem("ID");
    var home_type = localStorage.getItem("home_type");
    var sql_ = localStorage.getItem("sql_");
    var area = localStorage.getItem("area");
    var paid_type = localStorage.getItem("paid_type");
    </script>

    <!--Init Functions-->
    <script>
    getLocation();
    </script>

    <script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
    <script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBAiI7LmsVJTTG-MITrXmdEi8qNw78q3SM",
    authDomain: "prana-deutschland.firebaseapp.com",
    databaseURL: "https://prana-deutschland.firebaseio.com",
    storageBucket: "prana-deutschland.appspot.com",
};
firebase.initializeApp(config);
</script>

<?php
// sometimes: include('/home/otark/public_html/phpinclude/sql.php');
include('../phpinclude/helpers.php');
include('../phpinclude/sql.php');
include('../phpinclude/functions.php');
include('../phpinclude/objects.php');
include('../phpinclude/content_functions.php');
get_languages();
load_languages_ToArrays("");
$resu_ = get_filters_URL("home");
apply_language($resu_[0]);
?>
</head>

<body bgcolor="#F2F2F2">

<!--SESSION VARIABLES-->
<script>
    var session = localStorage.getItem("session");
    var uname = localStorage.getItem("uname");
</script>
<center>
<div id="content">
    <script type="text/javascript">
    //dl_d(code_snippets[4]);
    top_menu("home0");
    </script>
    <br>
    <script type="text/javascript">
    dashboard("home");
    </script>
</div>
</center>
<br><br><br><br><br><br>
<div id="footer">
  <center><script>show_copyright();</script></center>
</div>
<script type="text/javascript">change_lang();</script>
</body>
</html>
