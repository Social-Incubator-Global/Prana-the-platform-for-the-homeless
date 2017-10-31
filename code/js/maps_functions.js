/*
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
*/

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var geocoder;

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
    return;
}

function map_placeholder()
{
    set_innerhtml("map_", "<center><div style='color: rgb(9, 103, 126); font-size:18px; font-family: \"Arial\", regular;'>Loading map...</div></center>");
    
    return;
}

function geolocate(address)
{
    /*try
    {*/
        geocoder = new google.maps.Geocoder();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) 
            {
                console.log(address);
                return results[0].geometry.location;
            }
            else
            {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    /*}
    catch(e){}*/
    return;
}

function start_map()
{
    document.write('<div id="map_"><script type="text/javascript" src="http://maps.google.com/maps/api/js?key= AIzaSyBIaHbCJHko4ThhoZ2UWKEj4sVV6VZnOeA"></script><div style="overflow:hidden;height:250px;width:100%;"><div id="gmap_canvas" style="height:250px;width:100%;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net/wordpress-portfolio/" id="get-map-data">themecircle</a></div></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:11,center:mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, "load", init_map);</script></div>');
    return;
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

function clear_markers(map)
{
    for (var i = 0; i < markers.length; i++)
    {
        def_addresses_gmaps[i].setMap(map);
    }
    return;
}

function set_markers(map)
{
    //GOOGLE SERVICES DO NOT ALLOW A QUERY OF MORE THAN 10 MARKERS PER SECOND
    //MORE THAN 10 MARKERS SET OFF A QUERY_LIMIT EXCEPTION PLEASE REFREAIN FROM GOING OVER 9.
    var marker, i;
    //for (i = 0; i < def_addresses_gmaps.length; i++)
    for (i = get_local("current_pin_index"); i < get_local("current_pin_index") + 9; i++)
    {
        if(i == get_local("current_pin_index") + 9 || i >= def_addresses_gmaps.length)
        {
            set_local("current_pin_index", i + 1);
            break;
        }
        geocoder = new google.maps.Geocoder();
        console.log("------------");
        console.log(def_addresses_gmaps[i]);
        geocoder.geocode( { 'address': def_addresses_gmaps[i]}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) 
        {
            console.log(results[0].geometry.location.lat());
            marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
            });
            //return results[0].geometry.location;
        }
        else
        {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
        /*console.log("ok1");
        position_ = geolocate(def_addresses_gmaps[i]);
        console.log(position_.lat());
        myLatLng={lat: position_.lat(), lng: position_.lng()};
        marker = new google.maps.Marker({
        position: myLatLng,
        map: map
        });*/
    }
    /*var myLatLng={lat: Number(p_lat), lng: Number(p_long)};
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });*/
    return;
}