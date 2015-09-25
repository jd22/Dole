<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dole </title>

        <link href="favicon1.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="css/lib/perfectscrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="css/lib/ionicons/ionicons.min.css">
        <link rel="stylesheet" href="css/styles.css" id="theme-css" />

        <!-- ===== STYLESHEETS END ===== -->
    </head>
    <body>
        <!-- Content container start -->
        <header class="page-header-section" style="background: url('images/home_img1.jpg');">
            <!-- Top navbar start -->
            <nav class="navbar navbar-default navbar-transparent-dark navbar-white">
                <div class="container" id="nav-container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#top-navbar" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> 
                        <a class="navbar-brand logo" href="#">
                            <img src="images/logo_white.fw.png" alt="App logo" width="175">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="top-navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="page_home.html">Features</a></li>
                            <li><a href="page_pricing.html">Pricing</a></li>
                            <li><a href="page_about.html">About Us</a></li>
                            <li><a href="page_contact.html">Contact Us</a></li>
                            <li><a href="<?php echo base_url();?>index.php/verify_Login"><strong>Ingresar</strong></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container container-padded">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-home-transparent">
                            <div class="panel-body panel-body-lg">
                                <h1>Sistema de Cronograma Dole</h1>
                                <p class="lead">
                                    Herramienta para el acceso rápido y automatizado de los diferentes
                                    programas realizados por la empresa.
                                </p>
                                <p>
                                    <a href="<?php echo base_url();?>index.php/verify_Login" class="btn btn-primary btn-lg">Ingresar</a>
                                    
                                </p>    
                            </div>
                        </div>
                        <div class="m-bot25">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- Top navbar end -->
        </header>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <ul class="list-inline">
                            <li><small>&copy; Dole Company - Tecnológico de Costa Rica</small></li>
                            <li><small><a href="#">Privacy</a></small></li>
                            <li><small><a href="#">Security</a></small></li>
                            <li><small><a href="#">Terms of use</a></small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer container end -->            
        <script src="js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/lib/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/pages/front_end.js" type="text/javascript"></script>
    </body>
</html>