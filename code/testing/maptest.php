<div id="map" style="height:500px;width:500px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?callback=ini"
    async defer></script>

<script type="text/javascript">

     var map;

    function ini()
    {
        var mapOptions =
        {
            center: new google.maps.LatLng(37.7831, -122.4039),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        map= new google.maps.Map(document.getElementById("map"), mapOptions);
    }
    ini();

</script>
