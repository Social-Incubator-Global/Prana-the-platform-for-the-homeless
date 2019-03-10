<!--
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2019>  <Oscar Arjun Singh Tark, Catie Carson, Nicholas Alexander Kearney, Jeremy Leresteux, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe, Nicholas Alexander Kearney, Jeremy Leresteux>

    Visitable link: www.prana-deutschland.de , for any inquiries contact at oscartark91@gmail.com

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
<title>Prana</title>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>

<?php
include("../phpinclude/core/includer.php");
includes(1);

get_languages();
load_languages_ToArrays("");
$resu_ = get_filters_URL("basic");
apply_language($resu_[3]);
load_organizations();
?>

<script>
set_location("content");
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
var ID = localStorage.getItem("ID");
var home_type = localStorage.getItem("home_type");
var sql_ = localStorage.getItem("sql_");
</script>

</head>
<body>
<script>
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
var home_type = localStorage.getItem("home_type");
var paid_type = localStorage.getItem("paid_type");
var view_type = localStorage.getItem("view_type");
var area = localStorage.getItem("area");
</script>
<script>
top_menu();
</script>
<div id="content">
<div id="main_content">
<div id ="gmaps" class="gmaps">
<div id='map_'>
    <script>//map_placeholder();</script>
    <div id="map" style="width:100%; height:100%;"></div>
    &nbsp;
</div>
    <script>
        var directions = [];
        var markers = [];

        function initMap()
        {
            getLocation();

            var p_lat = get_local("current_position_lat");
            var p_long = get_local("current_position_long");

            var markerArray = def_addresses_gmaps;
            // Instantiate a directions service.
            var directionsService = new google.maps.DirectionsService;
            // Create a map and center it on Berlin MANUALLY.
            var map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 11,
                    center: {lat: Number(p_lat), lng: Number(p_long)}
                    // center: new google.maps.LatLng(52.5069312, 13.1445412),
                }
            );
            current_map = map;
            set_markers(current_map);

            /*var marker, i;
            for (i = 0; i < def_addresses_gmaps.length; i++)
            {
                position_ = geolocate(def_addresses_gmaps[i]);
                marker = new google.maps.Marker({
                position: position_,
                map: map
                });
            }*/
            //TEST MARKER!!! TESTING PURPOSES ONLY!
            /*var myLatLng={lat: Number(p_lat), lng: Number(p_long)};
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });*/
        }

    refresh_localstorage();
    load_map();
    function load_map()
    {
        document.write('<scr'+'ipt as'+'ync def'+'er s'+'rc="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIaHbCJHko4ThhoZ2UWKEj4sVV6VZnOeA&callback=initMap&language='+def_langs_gmaps[lang]+'&region='+def_langs_gmaps_reg[lang]+'"></scr'+'ipt>');
    }
    </script>
</div>
</body>
