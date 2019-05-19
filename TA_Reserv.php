<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TransportAPP</title>
    <meta name="description" content="Menú PIMDE">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script src="./js/autocompleteAddres.js"></script> -->
    <!-- &callback=initAutocomplete -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">TransportAPP</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-user"></i>User name</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-puzzle-piece"></i>
                                <a href="ui-buttons.html">Información de usuario</a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="ui-badges.html">Historial de viajes</a>
                            </li>
                            <li>
                                <i class="fa fa-bars"></i>
                                <a href="ui-tabs.html">Quejas y sugerencias</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-comments-o"></i>Acerca nosotros
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-power-off"></i>Cerrar sesión
                        </a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header blue-bg white-text">
                                <h4>Unidades disponibles</h4>
                            </div>
                            <div class="card-body ">
                                <div id="map" class="map"></div>
                                <br>
                                <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block">Reservar lugar en unidad</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header blue-bg white-text">
                                <h4>Reservación de unidad</h4>
                            </div>
                            <div class="card-body">
                                <form action="./unidadesDisponibles.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Seleccione punto de partida:</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="autocompleteDropIn" name="dropIn" placeholder="Ingresa dirección" class="form-control" onFocus="geolocate()">
                                            <small class="form-text text-muted">Ingresa la dirección donde abordarás</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Seleccione punto de descenso:</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="autocompleteDropOff" name="dropOff" placeholder="Ingresa dirección" class="form-control">
                                            <small class="form-text text-muted">Ingresa la dirección del final de tu viaje</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Número de asientos:</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="numSeats" class="form-control" type="number" value="1" min="1" max="15" />
                                            <small class="form-text text-muted">Usa las flechas para seleccionar el número de asientos que deseas</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-block btn-success" value="Elegir unidad">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-block btn-danger" value="Cancelar">
                                        </div>
                                    </div>
                                </form>
                                <!-- /# card -->
                            </div>
                        </div>
                    </div>
                    <!-- .animated -->
                </div>
                <!-- .content -->


            </div>
            <!-- /#right-panel -->

            <!-- <script>
                
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;

var componentForm = {
street_number: 'short_name',
route: 'long_name',
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
postal_code: 'short_name'
};

function initAutocomplete() {
// Create the autocomplete object, restricting the search predictions to
// geographical location types.
autocomplete = new google.maps.places.Autocomplete(
    document.getElementById('autocompleteDropIn'), {types: ['geocode']});

// Avoid paying for data that you don't need by restricting the set of
// place fields that are returned to just the address components.
autocomplete.setFields(['address_component']);

// When the user selects an address from the drop-down, populate the
// address fields in the form.
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
        }
    }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    console.log( "On focus..." );
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };
    var circle = new google.maps.Circle(
        {center: geolocation, radius: position.coords.accuracy});
    autocomplete.setBounds(circle.getBounds());
    });
}
}


            </script> -->

            <script src="./js/autocompleteAddres.js"></script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_tO0YLLkYTNrxBz1vdFvFf58g4CPYcGM&libraries=places&callback=initAutocomplete"></script>

            <!-- Right Panel -->
            <script src="assets/js/map.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdFw-LWUKSGXxFG5eTsTy1pVFzminfsM&libraries=places&callback=initAutocomplete"
                async defer></script>-->
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/spiNum.js"></script>
            <script src="assets/js/main.js"></script>

            <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
            <script src="assets/js/dashboard.js"></script>
            <script src="assets/js/widgets.js"></script>
            <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
            <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
            <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
            <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
            <script>
                function redirect(){
                    window.location.href = "./unidadesDisponibles.php";
                }
            </script>


</body>

</html>