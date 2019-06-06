<?php
    session_start();
    if( isset( $_SESSION['email'] ) && isset( $_SESSION['rol'] ) ){
        header('Location: ./'.$_SESSION['rol'].".php");
        die();
    }

    if( isset($_POST['email']) && isset($_POST['pass']) ){
        session_start();
        $email=$_POST['email'];
        $_SESSION['email'] = $email;
        require('librerias/api.php');
        $api = new API_tmx();
        $user = $api->doQuery("SELECT * FROM usuarios WHERE email='$email';");
        if( ! empty($user) ){
            $_SESSION['rol'] = $user[0]['rol'];
            header('Location: ./'.$_SESSION['rol'].".php");
            die();
        }else{
            header('Location: ./login.php');
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
                    <li>
                        <a href="#Cover" class="dropdown-toggle nav-link" data-toggle="tab" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-home"></i>Inicio
                        </a>
                    </li>
                    <li>
                        <a href="./login.php" class="dropdown-toggle nav-link" data-toggle="tab" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-user"></i>Inicio de sesion
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="tab" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-user"></i>Viaja con TransportAPP
                        </a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >
        <!--<div class="tab-content">
            <div class="tab-pane active" id="Cover">
                <div id="Cover-overlay"><img src="images/logoTA.png" style="width: 60%; height: 60vh;"></div>
            </div>    
        
        </div>-->
        <br><br><br>
            <div class="content mt-3" >
    
                <div class="row">
                    <div class="col-md-6 offset-md-3 mr-auto ml-auto" >    
                        <div class="card">
                            <div class="card-header" style="background-color:#17a2b8;color:#ffff!important">
                                Inicio de Sesion
                            </div>
                            <form method="POST" action="./login.php">
                            <div class="card-body card-block" style="padding:15px 20px">
                                <div class="form-group">
                                    <label class=" form-control-label">Usuario</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border-radius:5px 0 0 5px"><i class="fa fa-user"></i></div>
                                        <input id="Name" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border-radius:5px 0 0 5px"><i class="fa fa-lock"></i></div>
                                        <input id="pass" type="password" class="form-control" name="pass">
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <a href="" style="color:#17a2b8"><small class="form-text text-muted" style="color:#17a2b8!important; float:left">Recuperar Contraseña</small></a>
                                </div>
    
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-sm" style="float:right">Login</button>
                                    <button type="submit" class="btn btn-success btn-sm" style="float:right;margin-right:15px">Crear Cuenta</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    

    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="assets/js/map.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete"
        async defer></script>
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