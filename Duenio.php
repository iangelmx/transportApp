<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TransportAPP</title>
    <meta name="description" content="Dueño de unidades TransportAPP">
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
                    <a class="navbar-brand" href="./">
                        TransportAPP
                    </a>
                </div>
    
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav nav-tabs navbar-nav nav-item" role="tablist">
                        <!-- /.menu-title -->
                        <h3 class="menu-title">Dueño de unidades</h3>
                        <!-- /.menu-title -->
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="menu-icon fa fa-bar-chart"></i>Informes</a>
                        </li>
    
    
                        <li>
                            <a href="./controllers/closeSession.php" class="dropdown-toggle">
                                <i class="menu-icon fa fa-sign-out"></i>Cerrar sesión</a>
                        </li>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </aside>
    <!-- Left Panel -->
    <script>
        function close(){
            window.location.href = "./controllers/closeSession.php";
        }
    </script>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                        
                    </div>
                </div>

                
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Informes de Unidades</h1>
                        <!-- <p>
                            Fecha inicial: <input value="01-01-2019" type="date" class="btn" style="border-color:gray; border-radius: 5px" >
                            Fecha inicial: <input type="date" class="btn" style="border-color:gray; border-radius: 5px" >
                        </p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                        <!--<div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Ganancias por Años </h4>
                                    <canvas id="team-chart"></canvas>
                                </div>
                            </div>
                        </div> --> <!-- /# column -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Ingresos por unidad Por Mes </h4>
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Ingresos por unidad Por Mes</h4>
                                    <canvas id="barChart2"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
        <!--  Chart js -->
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs-init2.js"></script>

</body>
</html>
