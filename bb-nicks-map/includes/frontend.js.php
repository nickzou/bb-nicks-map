"use strict";

var body = document.getElementsByTagName("BODY")[0];
var mapContainer = document.getElementById('map');
var map;

var initMap = function initMap() {
  var myLatLng = {
    lat: parseFloat(locations[0].lat),
    lng: parseFloat(locations[0].lng)
  };
  map = new google.maps.Map(mapContainer, {
    center: myLatLng,
    zoom: 15
  });
  locations.forEach(function (location) {
    var marker = new google.maps.Marker({
      position: {
        lat: parseFloat(location.lat),
        lng: parseFloat(location.lng)
      },
      map: map,
      title: 'Hello World!'
    });
    var contentString = "<div class='content'><h1>".concat(location.name, "</h1><p>").concat(location.description, "</p></div>");
    var infoWindow = new google.maps.InfoWindow({
      content: contentString
    });
    marker.addListener('click', function () {
      infoWindow.open(map, marker);
    });
  });
};

window.initMap = initMap;
var googleMaps = document.createElement('script');
googleMaps.defer = true;
googleMaps.async = true;
googleMaps.src = "https://maps.googleapis.com/maps/api/js?key=<?php echo $settings->api_key; ?>&callback=initMap";
body.appendChild(googleMaps);
var locations = JSON.parse('<?php echo json_encode($settings->location_field, JSON_HEX_APOS | JSON_HEX_QUOT); ?>');