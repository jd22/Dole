<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Proctor - by Creligent </title>

        <link href="favicon1.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="<?=base_url()?>css/lib/bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="<?=base_url()?>css/lib/perfectscrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="<?=base_url()?>css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/lib/ionicons/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/styles.css" id="theme-css" />

        <!-- ===== STYLESHEETS END ===== -->
    </head>
    <body>
        <!-- ===== PAGE START ===== -->
        <header>
            <!-- Top navbar start -->
            <nav class="navbar navbar-default navbar-transparent">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#top-navbar" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="ion ion-ios7-gear-outline"></i>
                        </button> 
                        <a class="navbar-brand logo" href="#">
                            <img src="<?=base_url()?>images/logo_white.fw.png" alt="App logo" width="165">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="top-navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?=base_url()?>index.php"><i class="fa fa-angle-left"></i> Regresar al inicio</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>    
            <!-- Top navbar end -->
        </header>
        <!-- Content container start -->
            <div class="container form-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="panel panel-default panel-more-shadow">
                            <div class="panel-body">
                                <div class="panel-desc">Ingrese sus credenciales</div>
                                <hr>
                                <?php echo form_open('verify_Login',array('class'=>'form-signin-heading'));?>
                                <div class="form-group">
                                        <input type="text" class="form-control input-lg" id="username"  name="username" placeholder="Nombre Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Contraseña">
                                    </div>
                                    <div class="checkbox m-bot15">
                                        <label>
                                            <input type="checkbox"> Mantener Sesión abierta.
                                        </label>
                                    </div>
                                    <?php echo form_error('password', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Content container end -->       
        <!-- ===== PAGE END ===== -->
        <script src="<?=base_url()?>js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>js/lib/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>js/lib/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>js/scripts.js" type="text/javascript"></script>
    </body>
</html>