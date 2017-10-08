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
<?php error_reporting(0);?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana Deutschland</title>
<head bgcolor="white">
<?php include '../partials/_css.php' ?>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/Mainstyle.css"/>
<link rel="stylesheet" href="../css/content.css"/>
<?php include '../partials/_js.php' ?>
<script src="../js/objects.js"></script>
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
//include('/home/otark/public_html/views/partials/content_functions.php');
//NEW
include('../views/partials/content_functions.php');
include('../views/partials/sql.php');
include('../views/partials/functions.php');
include('../views/partials/objects.php');
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
<div id="sidebanner">
  <div id="section_info">
      <center>
          <center>
     <div id="section_image">
        <script>
           if(home_type == "food")
           { document.write('<img src="../Assets/Images/icons/icon_food.png" width="105px" height="105px">'); }
           else if(home_type == "housing")
           { document.write('<img src="../Assets/Images/icons/icon_housing.png" width="105px" height="105px">'); }
           else if(home_type == "medical")
           { document.write('<img src="../Assets/Images/icons/Icon_health.png" width="105px" height="105px">'); }
           else if(home_type == "legal & documents")
           { document.write('<img src="../Assets/Images/icons/icon_legal and advice.png" width="105px" height="105px">'); }
           else if(home_type == "study")
           { document.write('<img src="../Assets/Images/icons/icon_study2.png" width="105px" height="105px">'); }
           else if(home_type == "jobs")
           { document.write('<img src="../Assets/Images/icons/icon_jobs.png" width="105px" height="105px">'); }
        </script>
     </div>
     <div id="section_title">
         <script>
           if(home_type == "food")
           { document.title = "Prana : " + dl_r(19); dl(19); }
           else if(home_type == "housing")
           { document.title = "Prana : " + dl_r(20); dl(20); }
           else if(home_type == "medical")
           { document.title = "Prana : " + dl_r(21); dl(21); }
           else if(home_type == "legal & documents")
           { document.title = "Prana : " + dl_r(22); dl(22); }
           else if(home_type == "study")
           { document.title = "Prana : " + dl_r(23); dl(23); }
           else if(home_type == "jobs")
           { document.title = "Prana : " + dl_r(24); dl(24); }
           else(document.write("Oppa, something broke :("));
         </script>
     </div>
        </center>
          <script>menu_home_type();</script><br><hr><br>
    <center><script>filters_load(home_type); redirect_ajax(4);</script></center>
  </div>
</div>
<div id="content">
<!--<br><br>-->
<div id="main_content">
<div id ="gmaps" style ="border: 1px #27697C; height: 97.3%; width: 29.1%; position: fixed; margin-top: 0%; margin-right: 0%; margin-left: 70.8%;">
<div id='map_'>
    <script>map_placeholder();</script>
    <div id="map" style="width:100%; height:95.8%;"></div>
    &nbsp;
    <script>
        var directions = [];

        function initMap()
        {
            var p_lat = get_local("current_position_lat");
            var p_long = get_local("current_position_long");

            var markerArray = [];
            // Instantiate a directions service.
            var directionsService = new google.maps.DirectionsService;
            // Create a map and center it on Berlin MANUALLY.
            var map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 11,
                    center: {lat: Number(p_lat), lng: Number(p_long)}
                }
            );
        }
    </script></div>

    <script>
    refresh_localstorage();
    document.write('<scr'+'ipt as'+'ync def'+'er s'+'rc="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIaHbCJHko4ThhoZ2UWKEj4sVV6VZnOeA&callback=initMap&language='+def_langs_gmaps[lang]+'&region='+def_langs_gmaps_reg[lang]+'"></scr'+'ipt>');
    </script>
</div>

<div id="content_boxes_area">
<script>
var variableToSend = 'home_type';
</script>
<!--AFTER PROCESSING IS DONE HERE/AFTERLOAD PROCESSING-->
<script>
    change_area();
    change_paidtype(def_types[paid_type]);
    change_lang();
    change_org();
    change_to_tc();
    change_dy();
    change_mo();
    change_ven_type();
    change_ven_allows();
</script>
<br><br>
<div id="All_Content_Boxes">
<?php
//LOAD CONTENT
$home_type = get_home_type();
$URLfilter_result=get_filters_URL($home_type);
$query = build_query_string($URLfilter_result, "content");
?>
<script>redirect_ajax(0);/*redirect_ajax(2);*/ /*response is async resp(2) is finished before resp(0)*/</script>
</div>
</div>
</div>
</div>
</body>
