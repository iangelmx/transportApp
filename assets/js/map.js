var markers =[]
function initAutocomplete() {
    /*Autocomplete direction*/
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtlocation'));
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        /*Guardar en la DB!!! */
        var dataloc = { "direct": place.formatted_address, 
        "lat": place.geometry.location.lat(), 
        "long": place.geometry.location.lng(),
        "widht":parseFloat(document.getElementById('txtxWidth').value),
        "height": parseFloat(document.getElementById('txtHeight').value)};
    });
    var contenInf =
    "<div class=\"card\">"+
    "<div class=\"card-body\">"+
    "<h4 class=\"card-title mb-3\">Espectacular AZC-E8 "+
    "<a data-toggle=\"modal\" href=\"#upEsp\"><i class=\"fa fa-edit\"></i></a>"+
    "<a data-toggle=\"modal\" href=\"#\"><i class=\"fa fa-minus\"></i></a></h4>"+
    "<p class=\"card-text\"><b>Tipo:</b>VIP, <b>Tamaño:</b>Grande, <b>Delegación:</b>Azcapotzalco, <b>Vía:</b>Primaria, <b>Impacto:</b>28,000 personas </p>"+
    "<img class=\"card-img-top\" src=\"images/esp1.jpg\" height=\"75\">"+
    "</div>"+
    "</div>"; 
    /*tests locations CDMX*/
    var locations =[{lat: 19.4261,lng:-99.13161},
        {lat: 19.3957,lng:-99.14260},
        {lat: 19.4507,lng: -99.1817},
        {lat: 19.4766,lng: -99.0965},
        {lat: 19.4255,lng: -99.0732}, 
        {lat: 19.4475,lng: -99.1048},
        {lat: 19.4786,lng: -99.1432}, 
        {lat: 19.5336,lng:-99.13161},
        {lat: 19.5161,lng:-99.06913},
        {lat: 19.4889,lng: -99.2030}, 
        {lat: 19.4792,lng:-99.16938},
        {lat: 19.4145,lng: -99.1872}, 
        {lat: 19.4359,lng: -99.2387}, 
        {lat: 19.4669,lng: -99.2009}, 
        {lat: 19.3912,lng: -99.1611}, 
        {lat: 19.3821,lng: -99.1288}, 
        {lat: 19.3892,lng: -99.0670}, 
        {lat: 19.4281,lng: -99.1068}, 
        {lat: 19.4624,lng:-99.05677},
        {lat: 19.3711,lng:-99.12268}] ;

    var cdmx = {lat:19.432018839822668,lng:-99.13367475635476};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: cdmx
    });
    /*Listener to add a marker with a click */
    /*map.addListener('click', function(event) {
        //addMarker(event.latLng);
        console.log("lat: "+event.latLng.lat()+", lng: "+event.latLng.lng());
    });*/
    var i;
    for(i=0;i<locations.length;i++){
        //console.log(locations[i]);
        addMarker(map,locations[i],contenInf);
    }
    //setMapOnAll(map);
}
function addMarker(map,location,contenInf) {
    var infoWindow = new google.maps.InfoWindow({
        content:contenInf
    });
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    marker.addListener('click',function(){
        infoWindow.open(map,marker)
        
    });
    markers.push(marker);
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}