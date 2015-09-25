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
                <div class="col-md-12">
                    <div class="panel panel-success panel-md">
                        <div class="panel-heading">Información del Proyecto</div>
                            <div class="panel-body">
                                <div class="starter-template">
                                    <label>Numero de Proyecto:</label>
                                    <div class="form-inline">
                                        <input type="number" id="nnumero" class="form-control" placeholder="Numero de Proyecto" name="numero" required="">
                                        <input type="button" id="agregarProyecto" class="btn btn-sm btn-success" value="Crear Proyecto" />
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-12" style="display:none" id="infoTratamientos">
                <div class="panel panel-info panel-md">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Tratamientos del Proyecto</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered"  id="Trataments">
                            <tr>
                                <th style="color:white;background:#108CAE" >Nº Tratamiento</th>
                                <th style="color:white;background:#108CAE">Cedula Aplicación</th>
                                <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                            </tr>
                        </table>
                        <button class="btn btn-success btn-sm" style="float:right"  type="button" id="modalAgregarProductoExiste" data-toggle="modal" data-target="#NewTratamentExiste">Tratemiento Existente</button>
                        <button class="btn btn-primary btn-sm" style="float:right" type="button" id="modalAgregarProducto" data-toggle="modal" data-target="#listaProductos">Nuevo Tratamiento</button>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
        
        <!-- Creacion del modal para agregar una cedula de aplicacion -->
        <div class="modal fade" id="NuevaCedula" tabindex="1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-success" style="background:#3E448A">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 style="color:white;text-align:center;" class="panel-title">Cedula de Aplicación</h4>
                    </div>
                    <div class="model-body" style="margin-top:5px;">
                        <!-- Opciones Generales -->
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">General</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="number" value="1" min="1" class="form-control" placeholder="Número de Proyecto" id="number_proyect" name="number_proyect" required/>
                                        </div>
                                        <!-- <div class="form-group">
                                            <?php echo form_label("Elegir Finca: ",'class="label label-primary"'), form_dropdown("selLands",$lands,'','class="form-control" id="lands"') ?>
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Semana de Aplicacaión Ej: 21-2015" id="week_aplication" name="week_aplication" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Semana de Aplicacaión Ej: 21-2015" id="week_aplication" name="week_aplication" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Semana de Aplicacaión Ej: 21-2015" id="week_aplication" name="week_aplication" required/>
                                        </div>
                                        <!-- <div class="form-group">
                                            <?php echo form_label("Descripción: ",'class="label label-primary"'), form_dropdown("selDescriptions",$descriptions,'','class="form-control" id="description"') ?>
                                        </div> -->
                                        <br></br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" placeholder="Fecha de Aplicación" readonly id="scheduled" name="scheduled"  required/>
                                            <!--  -->
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="display:none;" placeholder="Week Post Seeding" id="week_post_seeding" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Información del bloque</h3>
                                </div>
                                <div class="panel-body" style="margin-top: 10px;">
                                    <div class="form-inline" role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Lote" id="batch" name="batch" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Bloque" id="block" name="block" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Estadio" id="stadium" name="stadium" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Semana de Siembra" id="week_seeding" name="week_seeding" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Area de Bloque" id="block_area" name="block_area" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Area de Proyecto" id="proyect_area" name="proyect_area" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tipo de Cultivo" id="culti_type" name="culti_type" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Variedad del Cultivo" id="product_range" name="product_range" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Dimension de parcelas</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Número de Camas" id="num_beds" name="num_beds" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Ancho de Camas(m)" id="beds_width" name="beds_width" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Largo de Percelas(m)" id="plots_length" name="plots_length" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Información de calibración</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Litros" id="litros" name="litros" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Presion(PSI)" id="presion" name="presion" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Velocidad(km/h)" id="velocidad" name="velocidad" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="R.P.M" id="r_p_m" name="r_p_m" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Marcha" id="marcha" name="marcha" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tipo de Boquilla" id="boquilla" name="boquilla" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="agregarTratamiento" class=" btn btn-primary" type="button">Agregar</button>
                        <button class=" btn btn-primary" type="button" id="cerrarTratamiento" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre del modal agregar tratamiento -->


<!-- Modal Para agregar Productos -->
        <div class="modal fade" id="listaProductos" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Productos del Tratamiento</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-md">
                                <div class="panel-body">
                                    <table class="table table-striped table-y-border"  id="idproductos" name="tabla">
                                        <tr>
                                            <th style="color:white;background:#108CAE">Producto Comercial</th>
                                            <th style="color:white;background:#108CAE">Ingrediente Activo</th>
                                            <th style="color:white;background:#108CAE">Dosis</th>
                                            <th style="color:white;background:#108CAE">Unidad</th>
                                            <th style="color:white;background:#108CAE">Inter. Secado</th>
                                            <th style="color:white;background:#108CAE">Inter. Cosecha</th>
                                            <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button style="margin-left:10px" class=" btn btn-primary" type="button" data-toggle="modal" onclick="" data-target="#AddProduct">Nuevo Producto</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal" id="crearTratamiento">Crear Tratamiento</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Para agregar Productos -->
        <div class="modal fade" id="AddProduct" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Agregar Producto</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Datos del Producto</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php echo form_dropdown("selProduct",$products,'','class="form-control" id="selectproducts" placeholder="Productos"') ?>
                                        <input  type="text" class="form-control" placeholder="Dosis" id="iddosis" name="dosis" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Común" id="idnombrecomun" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Científico" id="idnombrecientifico" name="nombrecientifico" required/>            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Intervalos</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Secado" id="idsecado" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Cosecha" id="idcosecha" name="nombrecientifico" required/>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" id="agregarProducto">Agregar</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre del modal de productos -->

        <!-- Modal de cedulas -->
<!-- Modal Para agregar Productos -->
        <div class="modal fade" id="listaCedulas" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Cedulas de Aplicacion</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-sm">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" id="tablaCedulas" border="0" class="datatable table table-striped table-bordered">
                                            <tr>
                                                <th style="color:white;background:#108CAE">Nº Cedula Aplicación</th>
                                                <th style="color:white;background:#108CAE">Información</th>
                                                <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <button class=" btn btn-primary" type="button" id="agregarProducto">Agregar</button> -->
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar Lista</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </section>
</div>
