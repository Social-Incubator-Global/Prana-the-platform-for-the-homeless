/*
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe>

    Visatable link: www.prana-deutschland.de , for any inquiries contact at contact@prana-deutschland.de

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
*/

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function new_route()
{
  gmap_canvas = document.getElementById("gmap_canvas");
  var stavanger = new google.maps.LatLng(58.983991,5.734863);
  var amsterdam = new google.maps.LatLng(58.395715,4.888916);
  var london = new google.maps.LatLng(51.508742,-0.120850);

  var mapCanvas = document.getElementById("gmap_canvas");
  var mapOptions = {center: stavanger, zoom: 4};
  var map = new google.maps.Map(mapCanvas,mapOptions);

  var flightPath = new google.maps.Polyline({
    path: [stavanger, amsterdam, london]
  });
  flightPath.setMap(map);
}

function center_marker()
{
}

function start_map()
{
document.write('<div id="map_"><script type="text/javascript" src="http://maps.google.com/maps/api/js?key= AIzaSyBIaHbCJHko4ThhoZ2UWKEj4sVV6VZnOeA"></script><div style="overflow:hidden;height:250px;width:100%;"><div id="gmap_canvas" style="height:250px;width:100%;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net/wordpress-portfolio/" id="get-map-data">themecircle</a></div></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:11,center:mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, "load", init_map);</script></div>');
}

//dead function?
function calcRoute() {
  var start = "berlin";
  var end = "prague";
  var request = {
    origin:start,
    destination:end,
    travelMode: 'DRIVING'
  };
  directionsService.route(request, function(response, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(response);
    }else{alert("hhh");}
  });
}