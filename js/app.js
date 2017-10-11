var googleMapsClient = require('@google/maps').createClient({
    key: ' AIzaSyCiGRiXtDPgWzyAUzWvnVsne0_G1X7p34E '
});// 



function init_map() {
    var myOptions = {
        zoom: 16, center: new google.maps.LatLng(43.2125816, 2.351357499999949), mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
    marker = new google.maps.Marker({
        map: map, position: new google.maps.LatLng(43.2125816, 2.351357499999949)
    });
    infowindow = new google.maps.InfoWindow({
        content: '<strong>Le Bistrot d\'Alice</strong><br>26 rue chartrand,11000 carcassonne<br>'
    });
    google.maps.event.addListener(marker, "click",
        function () {
            infowindow.open(map, marker);
        });
    infowindow.open(map, marker);
}
google.maps.event.addDomListener(window, "load", init_map);