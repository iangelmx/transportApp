var markers = []
function initAutocomplete() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var locations = [
        {lat: 19.510704773930748, lng: -99.10990740234377},
        {lat: 19.539179844556898, lng: -99.07832170898439},
        {lat: 19.5689438675536, lng: -99.0570356982422},
        {lat: 19.583823818771545, lng: -99.04673601562502},
        {lat: 19.600966405943222, lng: -99.03986956054689},
        {lat: 19.62150276113751, lng: -99.04433275634767},
        {lat: 19.643006525093604, lng: -99.05463243896486},
        {lat: 19.67000341271637, lng: -99.06785036499025},
        {lat: 19.685358895252392, lng: -99.07506014282228},
        {lat: 19.691985543514782, lng: -99.08913637573244}
    ];
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 130,
        center: { lat: 19.554965, lng: -99.04182400000002 }
    });
    directionsDisplay.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsDisplay);
    for(i=0;i<locations.length;i++){
        //console.log(locations[i]);
        addMarker(map,locations[i]);
    }
    /*map.addListener('click', function(event) {
        addMarker(map,event.latLng);
        console.log("lat: "+event.latLng.lat()+", lng: "+event.latLng.lng());
    });*/
}
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
      origin: "Municipio De Tultitlán, Prados del Centro 5, Morelos 3ra Secc, 54930 San Pablo de las Salinas, Méx.",
      destination: "Indios Verdes, Residencial Zacatenco, 07369 Santa Isabel Tola, CDMX",
      optimizeWaypoints: true,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
function addMarker(map, location) {
    var icon = {
        url:'./assets/js/combi.png',
        scaledSize: new google.maps.Size(20,20),
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        icon:icon
    });
    marker.setMap(map);
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}