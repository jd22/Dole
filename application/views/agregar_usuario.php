<div class="container-fluid container-padded dash-controls">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Usuarios</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </div>
    </div><p></p>
</div>
<!-- Main content start -->
<div class="main-content">
    <!-- Section start -->
    <section>
        <!-- title container start -->
        <div class="container-fluid container-padded">
            <div class="row">
                <div class="col-md-12 page-title">
                    <h3>Información Requerida</h3>
                    <hr>
                </div> <!-- col end -->
            </div> <!-- row end -->
        </div>
        <!-- title container end -->
        <!-- section container start -->
        <div class="container-fluid container-padded">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Información del Producto</div>
                            <div class="panel-body">
                                <div class="starter-template">
                                    <?php echo form_open('AddUser',array('class'=>'form-signin'));?>
                                    <h4>Agregar Nuevo Usuario</h4>
                                	<div class="form-group">
                                		<input title=""type="text" class="form-control" placeholder="Nombre Usuario" name="username" required="">
                                		
                                	</div>
                                	<div class="form-group">
                                	    <input type="text" class="form-control" placeholder="Nombre" name="name" required="">
                                	</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Correo" name="email" required="">
                                    </div>
                                	<?php echo form_error('username','<div class="alert alert-danger contact-warning">','</div>')?>
                                	
                                	<div class="form-group">
                        				<button type="submit" class="btn btn-lg btn-primary btn-block">Agregar</button>
                        			</div>
                                </div>
                            </div>
                        </div><!-- /.container -->
                    </div> <!-- col end -->
                </div> <!-- row end -->
            </div>
        </div>
    </section>
