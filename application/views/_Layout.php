<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Programas de Aplicación">
    <meta name="author" content="Tecnológico de Costa Rica">
    <title>Dole Company </title>
    <link href="<?=base_url()?>images/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?=base_url()?>css/lib/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/lib/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/lib/daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/lib/tabdrop/tabdrop.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/styles.css" id="theme-css" />
</head>
<body>
    <!-- ===== PAGE START ===== -->
    <header>
        <!-- Top navbar start -->
        <nav class="navbar navbar-default navbar-transparent">
            <div class="container" id="nav-container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggle navbar-toggle-settings" data-target="#top-navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ion ion-ios7-gear-outline"></i>
                    </button>
                    <a class="navbar-brand logo" href="<?=base_url()?>">
                        <img src="<?=base_url()?>images/logo_white.fw.png" alt="App logo" width="165">
                    </a>
                    <div class="navbar-side-menu-toggle">
                        <button class="toggle-btn" type="button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=base_url()?>Home">Inicio</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i> <span class="notification-title">Notifications</span><span class="badge badge-info notification-badge">6</span></a>
                            <div class="dropdown-menu notification-menu">
                                <div class="panel panel-plain m-bot0">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-ban text-danger"></i> Nikita Williams rejected an Action Step from you
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-check-circle text-success"></i> You accepted an Action Step from Scott Marshall
                                        </a>
                                    </div>
                                    <div class="panel-footer p-0">
                                        <a href="#" class="btn btn-link btn-block m-bot0">View all</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?=base_url()?>images/user.png" alt="Pic" class="user-settings-pic"> Administrador <i class="fa fa-angle-down"></i></a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- Top navbar end -->
    </header>
    <!-- Content container start -->
    <div class="container" id="content-container">
        <div class="content-wrapper">
            <div class="row">
                <!-- Side menu + Content start -->
                <div class="side-nav-content">
                    <!-- Side menu start -->
                    <div class="left-side-wrapper">
                        <!-- left side start-->
                        <div class="left-side sticky-left-side">
                            <div class="left-side-inner">
                                <!--sidebar nav start-->
                                <ul class="nav nav-pills nav-stacked custom-nav">
                                    <li class="menu-list ">
                                        <a href="#"><i class="ion ion-speedometer"></i> <span>Inicio</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                            <ul class="sub-menu-list">
                                                <!-- <li>
                                                    <a href="index_1.html">Company analytics</a>
                                                </li>
                                                <li>
                                                    <a href="index_2.html">Sales board</a>
                                                </li> -->
                                            </ul>
                                    </li>
                                    <li class="nav-header">Proyectos/Experimentos</li>
                                    <li class="menu-list">
                                        <a href=""><i class="fa fa-arrows"></i> <span>Proyectos</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="<?=base_url()?>Proyecto/index/-1"><i class="glyphicon glyphicon-plus-sign"></i>Nuevo Proyecto</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>Proyecto/listaProyectos"><i class="glyphicon glyphicon-list"></i>Lista de Proyectos</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="nav-header">Opciones Generales</li>
                                    <li class="menu-list">
                                        <a href=""><i class="glyphicon glyphicon-th"></i> <span>Productos</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <!-- <li>
                                                <a href="<?=base_url()?>Aplication"><i class="glyphicon glyphicon-plus-sign"></i>Nueva Aplicación</a>
                                            </li> -->
                                            <li>
                                                <a href="<?=base_url()?>Product"><i class="glyphicon glyphicon-plus-sign"></i>Nuevo Producto</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>Product/listaProductos"><i class="glyphicon glyphicon-list"></i>Lista Productos</a>
                                            </li>
                                            <!-- <li>
<<<<<<< HEAD
                                                <a href="<?=base_url()?>Cedula"><i class="glyphicon glyphicon-list"></i>Lista Cedulas</a>
                                            </li> -->
=======
+                                                <a href="<?=base_url()?>Cedula"><i class="glyphicon glyphicon-list"></i>Lista Cedulas</a>
+                                            </li> -->
>>>>>>> JosueBranch
                                        </ul>
                                    </li>
                                    <li class="menu-list ">
                                        <a href=""><i class="fa fa-eye"></i> <span>Vista Cronograma</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="<?=base_url()?>Calendar"><i class="fa fa-calendar"></i> Calendario</a>
                                            </li>
                                            <!-- <li>
                                                <a href="<?=base_url()?>">Typography</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>">Buttons</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>">Tabs & Accordians</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>">Panels</a>
                                            </li>
                                            <li>
                                                <a href="ui_alerts.html">Alerts & Modals</a>
                                            </li>
                                            <li>
                                                <a href="ui_icons.html">Icons</a>
                                            </li>
                                            <li>
                                                <a href="ui_components.html">Components</a>
                                            </li>
                                            
                                            <li>
                                                <a href="ui_list.html">List & Tree</a>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <!-- <li class="menu-list ">
                                        <a href=""><i class="ion ion-document"></i> <span>Forms</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="form_basic.html">Basic</a>
                                            </li>
                                            <li>
                                                <a href="form_advanced.html">Advanced</a>
                                            </li>
                                            <li>
                                                <a href="form_validation.html">Validation</a>
                                            </li>
                                            <li>
                                                <a href="form_editors.html">Editors</a>
                                            </li>

                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-list ">
                                        <a href=""><i class="ion ion-grid"></i> <span>Tables</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="table_basic.html">Basic</a>
                                            </li>
                                            <li>
                                                <a href="table_responsive.html">Responsive</a>
                                            </li>
                                            <li>
                                                <a href="table_datatables.html">Datatables</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-list">
                                        <a href="#"><i class="ion ion-laptop"></i> <span>Layouts</span> <i class="ion ion-ios7-arrow-up pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="layout_grid.html">Grid system</a>
                                            </li>
                                            <li>
                                                <a href="layout_full.html">Full-width</a>
                                            </li>
                                            <li>
                                                <a href="layout_blank.html">Blank page</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="nav-header">Configuración de Sistema</li>
                                    <li class="menu-list ">
                                        <a href=""><i class="glyphicon glyphicon-user"></i> <span>Usuarios</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="<?=base_url()?>AddUser"><i class="glyphicon glyphicon-plus"></i> Nuevo Usuario</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>User"><i class="glyphicon glyphicon-th-list"></i> Lista de Usuarios</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- li class="menu-list ">
                                        <a href="#"><i class="ion ion-location"></i> <span>Maps</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="map_google.html">Google Maps</a>
                                            </li>
                                            <li>
                                                <a href="map_vector.html">Vector maps</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="nav-header">Application Pages</li>
                                    <li class="menu-list ">
                                        <a href=""><i class="ion ion-settings"></i> <span>App Pages</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="app_login.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="app_signup.html">Signup</a>
                                            </li>
                                            <li>
                                                <a href="app_forgot_password.html">Recover password</a>
                                            </li>
                                            <li>
                                                <a href="app_social_login.html">Social login</a>
                                            </li>
                                            <li>
                                                <a href="app_profile.html">User profile</a>
                                            </li>
                                            <li>
                                                <a href="app_invoice.html">Invoice</a>
                                            </li>
                                            <li>
                                                <a href="app_settings.html">Settings</a>
                                            </li>
                                            <li>
                                                <a href="app_tour.html">App tour</a>
                                            </li>
                                            <li>
                                                <a href="app_timeline.html">Timeline</a>
                                            </li>
                                            <li>
                                                <a href="app_support.html" target="_blank">Support</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-list ">
                                        <a href=""><i class="ion ion-document"></i> <span>Extra Pages</span> <i class="ion ion-ios7-arrow-down pull-right"></i></a>
                                        <ul class="sub-menu-list">
                                            <li>
                                                <a href="page_notifications.html">Notifications</a>
                                            </li>
                                            <li>
                                                <a href="page_faq.html">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="404.html">404 Error</a>
                                            </li>
                                            <li>
                                                <a href="500.html">500 Error</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <!--sidebar nav end-->

                            </div>
                        </div>
                        <!-- left side end-->
                    </div>
                    <!-- Side menu end -->
                    <!-- Main content wrapper start -->
                    <div class="main-content-wrapper">