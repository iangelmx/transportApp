<?php
require('./librerias/api.php');



$api = new API_tmx();

$unidadesDisponibles = $api->doQuery("SELECT
    placa, distancia, (capacidad-ocupabilidad) as 'lugares', v.idUnidad, u.chofer
    FROM unidades u INNER JOIN viaje v
    ON u.idUnidad = v.idUnidad
    WHERE u.capacidad > v.ocupabilidad
    AND status = 'en_curso'
    ORDER BY distancia ASC;")
?>
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
                                <h4>Selección de unidad</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <!------------------------------- -->
                                <?php
                                    foreach($unidadesDisponibles as $unidad) {
                                        echo ' 
                                        <a>
                                        <section class="card" onclick="muestraDatos(this)" id=" '. $unidad['idUnidad'] .' ">
                                            <div class="twt-feed blue-bg">
                                                <div class="corner-ribon black-ribon">
                                                    <i class="fa fa-bus"></i>
                                                </div>
                                                <div class="fa fa-bus wtt-mark"></div>

                                                <div class="media">
                                                    <a href="#">
                                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/renaultTrafic.jpg">
                                                    </a>
                                                    <div class="media-body">
                                                        <h2 class="text-white display-6">'. $unidad['distancia'].' minutos de distancia</h2>
                                                        <p class="text-light">Placas: '. $unidad['placa'] . '</p>
                                                        </div>
                                                    </div>
    
    
    
                                                </div>
                                                <div class="weather-category twt-category">
                                                    <ul>
                                                        <li class="active">
                                                            <h5>'. $unidad['idUnidad'] .'</h5>
                                                            Núm. económico
                                                        </li>
                                                        <li>
                                                            <h5>'. $unidad['lugares'] . '</h5>
                                                            Lugares disponibles
                                                        </li>
                                                        <li>
                                                            <h5>' . $unidad['chofer'] . '</h5>
                                                            Conduce
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </section></a>';
                                    }
                                ?>
                                    <!-- <div class="col-md-4"> -->
                                        <!--
                                        <section class="card">
                                            <div class="twt-feed blue-bg">
                                                <div class="corner-ribon black-ribon">
                                                    <i class="fa fa-bus"></i>
                                                </div>
                                                <div class="fa fa-bus wtt-mark"></div>

                                                <div class="media">
                                                    <a href="#">
                                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/renaultTrafic.jpg">
                                                    </a>
                                                    <div class="media-body">
                                                        <h2 class="text-white display-6">7 minutos de distancia</h2>
                                                        <p class="text-light">Placas: MYH-3218</p>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="weather-category twt-category">
                                                <ul>
                                                    <li class="active">
                                                        <h5>43</h5>
                                                        Núm. económico
                                                    </li>
                                                    <li>
                                                        <h5>3</h5>
                                                        Lugares disponibles
                                                    </li>
                                                    <li>
                                                        <h5>Ángel L.</h5>
                                                        Conduce
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </section> -->
                                    <!-- </div> -->

                                    <!---------------------------------- -->


                                    <!-- <div class="row form-group">
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-block btn-success" value="Finalizar Compra">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="button" class="btn btn-block btn-danger" value="Cancelar">
                                        </div>
                                    </div> -->
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

            <!-- Right Panel -->
            <script src="assets/js/map.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdFw-LWUKSGXxFG5eTsTy1pVFzminfsM&libraries=places&callback=initAutocomplete"
                async defer></script>
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

            <script type="text/javascript">
                function muestraDatos(element){
                    console.log("Click a:"+ element.id );
                }
            </script>


</body>

</html>