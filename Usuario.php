<?php
session_start();
?><!doctype html>
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
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

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
                        <a href="./controllers/closeSession.php">
                            <i class="menu-icon fa fa-power-off"></i>Cerrar sesión
                        </a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- commentss -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Unidades disponibles</h4>
                            </div>
                            <div class="card-body">
                                <div id="map" class="map"></div>
                                <br>
                                <a href="./TA_Reserv.php"><button type="submit" class="btn btn-primary float-left">Reservar lugar en unidad</button></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- .content -->


    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="assets/js/map.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete"
         ></script>
    <script src="assets/js/plugins.js"></script>

    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>


</body>

</html>