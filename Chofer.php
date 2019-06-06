<?php
	session_start();
    require('librerias/api.php');
	$valor= '';
	$result= -1;
    $api = new API_tmx();
	if (isset($_POST ['b1'])){
	$codigo= $_POST['ticketId'];
	$result=$api-> existsInDB("tickets"," codigo = '".$codigo."'");
	if( $api-> existsInDB("tickets"," codigo = '".$codigo."'") > 0 ) { 
		$valor=1;
	}	
	else{
		$valor=0;
	}
	}
	
	
    
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
    <meta name="description" content="Chofer">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdFw-LWUKSGXxFG5eTsTy1pVFzminfsM&libraries=places&callback=initAutocomplete"
        async defer></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script>
    $(".imagesVal").hide();
    </script>
    <style>
    .noVisible{
  display: none;
}
    </style>
</head>

<body>
    <!--Left nav bar-->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                    TransportAPP
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav nav-tabs navbar-nav nav-item" role="tablist">
                    <!-- /.menu-title -->
                    <h3 class="menu-title">Chofer info</h3>
                    <!-- /.menu-title -->
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-user"></i>Modificar información</a>
                    </li>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-gear"></i>Cambio de contraseña</a>
                    </li>

                    <li>
                        <a href="./controllers/closeSession.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-sign-out"></i>Cerrar sesión</a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left">
                        <i class="fa fa fa-tasks"></i>
                    </a>
                    <div class="header-left">
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Tienes una notificación</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Servicio #1 Pendiente.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Instalación #2 Pendiente.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Servicio #3 Pendiente.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#">
                                <i class="fa fa- user"></i>Mi Perfil</a>

                            <a class="nav-link" href="#">
                                <i class="fa fa-power -off"></i>Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Chofer</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3" id="ConsCli">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Datos de pasajeros</strong>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="idTicket" class="col-sm-2 col-form-label">Número de ticket</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ticketId" id="ticketId" placeholder="Ingresa el código del ticket">
                                </div>
								
								<!--Botón-->
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" value="send" name="b1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
						
						<?php if($result > 0): ?>
                            <p> <?= "El ticket ha sido validado" ?></p>
							<div class="container " id="TicketCheck">
								<div class="d-flex justify-content-center">
								
								<br>
								</div>
								<div class="imagesVal d-flex justify-content-center">
									<img src="images/ok.png" style="height: 35vh" width="100%">
								</div>
							</div>
			
							<div class="container noVisible" id="TicketCheck">
								<div class="imagesVal d-flex justify-content-center">
									<?php if(!empty($result)): ?>
									<p> <?= $result ?></p>
									<?php endif; ?>
									<br>
								</div>
								<div class="imagesVal d-flex justify-content-center" >
									<img src="images/fail.png" style="height: 35vh" width="100%">
								</div>
							</div>
						<?php endif; ?>
						
						<?php if($result == 0): ?>
                            <p> <?= "El ticket no existe" ?></p>
							<div class="container noVisible " id="TicketCheck">
								<div class="d-flex justify-content-center">
								
								<br>
								</div>
								<div class="imagesVal d-flex justify-content-center">
									<img src="images/ok.png" style="height: 35vh" width="100%">
								</div>
							</div>
			
							<div class="container" id="TicketCheck">
								<div class="d-flex justify-content-center">
									<?php if(!empty($result)): ?>
									<p> <?= $result ?></p>
									<?php endif; ?>
									<br>
								</div>
								<div class="imagesVal d-flex justify-content-center" >
									<img src="images/fail.png" style="height: 35vh" width="100%">
								</div>
							</div>
						<?php endif; ?>
						
						
                    </div>
                </div>
            </div>
        </div>


        <!--Info Espectacular-->
        
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/map.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/jszip.min.js"></script>
        <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
        <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="assets/js/lib/data-table/datatables-init.js"></script>


        <script>
            jQuery(document).ready(function () {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
            
            $(".imagesVal").hide();

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#bootstrap-data-table-export').DataTable();
            });
        </script>
</body>

</html>