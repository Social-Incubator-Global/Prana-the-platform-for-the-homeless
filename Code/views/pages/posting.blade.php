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
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana Deutschland</title>
<head bgcolor="white">
<?php include '../partials/_css.php' ?>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/Mainstyle.css"/>
<link rel="stylesheet" href="../css/posting.css"/>

<?php include '../partials/_js.php' ?>
<script src="../js/objects.js"></script>
<script src="../js/forms.js"></script>
<script src="../js/maps_functions.js"></script>
<script src="../js/session.js"></script>
<!--JS Variables-->
<script>
    set_location("posting");
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
    storageBucket: "prana-deutschland.appspot.com"
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
    include('../views/partials/content_functions.php');
    include('../views/partials/sql.php');
    include('../views/partials/functions.php');
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
     <script>
    document.write('<div id="nav_buttons" style="width:145px; height:30px;"><center><form><input type="button" style="height: 30px;border-radius: 3px;" value="'+def_lang[40]+'" onclick="javascript:window.history.back();"></input><input type="button" style="height: 30px; margin-left:4px;border-radius: 3px;" value="'+def_lang[41]+'" onclick="javascript:window.history.forward();"></input></form></center></div>');</script><br><br>
     </center><br>
     <center><br><br><br><hr><br>
     <script>show_copyright();</script></center>
  </div>
</div>
<div id="content">
<br><br>
<div id="main_content">
<div id='map_'>
    <script>map_placeholder();</script>
    <form>
        <input id='map_size' type='button' onclick='javascript:var sze=localStorage.getItem("map_size"); if(sze==0){document.getElementById("map_size").value=dl_r(80);document.getElementById("map").style.height="90%"; localStorage.setItem("map_size",1);} else{document.getElementById("map_size").value=dl_r(79);document.getElementById("map").style.height="250px";localStorage.setItem("map_size",0);} refresh_map();'></input>
    </form>
    <script>document.getElementById("map_size").value=dl_r(79);</script>
    <div id="floating-panel">
    <select id="start">
      <option value="Spandau, berlin, de">Test->Spandau</option>
    </select>
    </div>
    <div id="map"></div>
    &nbsp;
    <script>
     var sze=localStorage.getItem("map_size");
     if(sze==1)
     {
         document.getElementById("map_size").value=dl_r(80);document.getElementById("map").style.height="90%";}
     else
     {
         document.getElementById("map_size").value=dl_r(79);document.getElementById("map").style.height="250px";
     }

      var directions = [];
      function initMap() {
        var markerArray = [];

        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;

        // Create a map and center it on Berlin MANUALLY.
        var p_lat = get_local("current_position_lat");
        var p_long = get_local("current_position_long");

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: Number(p_lat), lng: Number(p_long)}
          //center: {lat: 52.517627, lng: 13.405565}
        });

        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
            directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
          calculateAndDisplayRoute(
              directionsDisplay, directionsService, markerArray, stepDisplay, map);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map)
      {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }

        var p_latlng = get_local("current_position_lat") + "," + get_local("current_position_long");
        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
          origin: p_latlng,
                  //document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: localStorage.getItem("transit_preference"),
          transitOptions: {
          modes: [localStorage.getItem("transit_liking")]},
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            /*document.getElementById('warnings-panel').innerHTML =
                '<b>' + response.routes[0].warnings + '</b>';*/
            directionsDisplay.setDirections(response);
            showSteps(response, markerArray, stepDisplay, map);
          } else {
          }
        });
      }

      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];

          document.getElementById("directions_gmaps").innerHTML= "";
        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
          marker.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
          directions.push(myRoute.steps[i].instructions);
          document.getElementById("directions_gmaps").innerHTML+= "<div id='dir_'>" + i + ". " + myRoute.steps[i].instructions + "</div>";
        }

      }

      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }
    </script></div>
    <script>
    refresh_localstorage();
    document.write('<scr'+'ipt as'+'ync def'+'er s'+'rc="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIaHbCJHko4ThhoZ2UWKEj4sVV6VZnOeA&callback=initMap&language='+def_langs_gmaps[lang]+'&region='+def_langs_gmaps_reg[lang]+'"></scr'+'ipt>');
    </script>

<div id="general_content"></div>
<?php
//LOAD CONTENT
load_posting();
?>
</div>

<script>
change_transit_type(transit_preference);
change_transit_liking(transit_liking);
</script>

<script>redirect_ajax(3, ID);</script>

<div id="footer">
    <br><br><center><script></script></center>
</div>

</body>
