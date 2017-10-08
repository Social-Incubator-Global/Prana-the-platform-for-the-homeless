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

<?php session_start();?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana Deutschland</title>

<head bgcolor="white">
<?php include '../partials/_css.php' ?>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/Mainstyle.css"/>
<link rel="stylesheet" href="../css/profile.css"/>
    <?php include '../partials/_js.php' ?>
    <script src="../js/objects.js"></script>
    <script src="../js/forms.js"></script>
    <script src="../js/maps_functions.js"></script>
    <script src="../js/session.js"></script>

    <!--Variables-->
       <script>

set_location("profile");
       var session = localStorage.getItem("session");
       var uname = localStorage.getItem("uname");
       var ID = localStorage.getItem("ID");
       var home_type = localStorage.getItem("home_type");
       var sql_ = localStorage.getItem("sql_");
       var transit_preference = localStorage.getItem("transit_preference");
       var transit_liking = localStorage.getItem("transit_liking");
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

  <script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

  <!-- Leave out Storage -->
  <!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script> -->

<?php
include('../phpinclude(content_functions.php');
include('../phpinclude(sql.php');
include('../phpinclude(functions.php');
get_languages();
load_languages_ToArrays("");
$resu_ = get_filters_URL("basic");
apply_language($resu_[3]);
?>
</head>

<body bgcolor="#F2F2F2">
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
    top_menu('posting');
</script>
<div id="sidebanner">
  <br><br>
  <div id="section_info">
  <center>
     <div id="section_image">
        <script>
             document.write(code_snippets[3]);
        </script>
     </div>
     <script>document.write('<div id="nav_buttons" style="width:145px; height:30px;"><center><form><input type="button" style="height: 30px;border-radius: 3px;" value="'+def_lang[40]+'" onclick="javascript:window.history.back();"></input><input type="button" style="height: 30px; margin-left:4px;border-radius: 3px;" value="'+def_lang[41]+'" onclick="javascript:window.history.forward();"></input></form></center></div>');</script>
     <br><br>
     </center>
      <br>
     <center>
         <br><br><br><hr><br>
     <script>show_copyright();</script></center>
  </div>
</div>
<div id="content">
<br>
<div id="top_content">
    <?php
        load_profile("person");
    ?>
</div>
</body>
