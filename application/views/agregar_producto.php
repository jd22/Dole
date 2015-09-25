<div class="container-fluid container-padded dash-controls">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Aplicaciones</a></li>
                <li class="active">Nuevo Producto</li>
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
                                    <?php echo form_open('Product',array('class'=>'form-signin'));?>
                                        <div class="form-group">
                                            <input title="" type="text" class="form-control" placeholder="Nombre" name="name" required="">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ingrediente Activo" name="active" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Unidad" name="unit" required="">
                                        </div>
                                        <?php echo form_error('username','<div class="alert alert-danger contact-warning">','</div>')?>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div0.>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
