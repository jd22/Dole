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
                                        <input type="text" id="nnumero" class="form-control" placeholder="Numero de Proyecto" name="numero" required="">
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
                                <th style="color:white;background:#108CAE">Cédula Aplicación</th>
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
                        <h4 style="color:white;text-align:center;" class="panel-title">Cédula de Aplicación</h4>
                    </div>
                    <div class="model-body" style="margin-top:5px;">
                        <!-- Opciones Generales -->
                        <div class="col-md-12" style="margin-top: 21px;">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title" id="numProyecto" style="color: rgb(113, 104, 181);font-size: x-large">Proyecto Numero</h3>
                                </div>
                                <div class="panel-body" style="text-align: center;">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <?php echo form_dropdown("selLands",$lands,'','class="form-control" id="idfinca" data-toggle="tooltip" data-placement="top" title="Ubicación(Fincas)"') ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_dropdown("selDescriptions",$descriptions,'','class="form-control" id="iddescripcion" data-toggle="tooltip" data-placement="top" title="Descripción de la Aplicación"') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="S. Aplicación: 22-2015" id="idsemanaaplicacion" name="idsemanaaplicacion" required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group" style="width: 280px;">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" placeholder="Fecha Programada" readonly id="idfechaprogramada" name="idfechaprogramada"  required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title">Datos de Calibración</h3>
                                </div>
                                <div class="panel-body" style="text-align: center;">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Litros" id="idlitros" name="idlitros" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Presion(PSI)" id="idpresion" name="idpresion" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Velocidad(km/h)" id="idvelocidad" name="idvelocidad" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="R.P.M" id="idr_p_m" name="idr_p_m" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Marcha" id="idmarcha" name="idmarcha" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tipo de Boquilla" id="idboquilla" name="idboquilla" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title">Información de Bloque</h3>
                                </div>
                                <div class="panel-body" style="margin-top: 10px;text-align: center;">
                                    <div class="form-inline" role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cultivo/Nombre Científico" id="idcultivonombrecientifico" name="idcultivonombrecientifico" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Variedad del Cultivo" id="idvariedadcultivo" name="idvariedadcultivo" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Lote" id="idlote" name="idlote" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Bloque" id="idbloque" name="idbloque" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Estadio: RC,PC" id="idestadio" name="idestadio" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="S Siembra/S cierre Cosecha" id="idsemanasiembra" name="idsemanasiembra" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Area block (m2)" id="idareabloque" name="idareabloque" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Area Proyecto (m2)" id="idareaproyecto" name="idareaproyecto" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title">Dimenciones de parcelas</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Cantidad de Camas" id="idnumerocamas" name="idnumerocamas" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Ancho de Camas(m)" id="idanchocamas" name="idcames" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Longitud de parcelas(m)" id="idlongitudparcelas" name="idlargoparcelas" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title">Información adicional</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cant. Tratamientos" id="idnumerotratamientos" name="idnumerotratamientos" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cant. Replicas" id="idnumeroreplicas" name="idnumeroreplicas" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cant. Parcelas" id="idnumeroparcelas" name="idnumeroparcelas" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Volumen de Aplicación" id="idvolumenaplicacion" name="idvolumenaplicacion" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_dropdown("selLands",$modo,'','class="form-control" id="idmodoaplicacion" data-toggle="tooltip" data-placement="top" title="Modo de Aplicación"') ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_dropdown("selLands",$metodo,'','class="form-control" id="idmetodoaplicacion" data-toggle="tooltip" data-placement="top" title="Método de Aplicación"') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button id="agregarCedula" class=" btn btn-primary" type="button" data-dismiss="modal">Crear Cédula</button>
                        <!-- <button class=" btn btn-primary" type="button" id="cerrarTratamiento" data-dismiss="modal">Cerrar</button> -->
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


<!-- Modal Para agregar Nuevos Productos al tratamiento -->
        <div class="modal fade" id="listanuevosProductos" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                                    <table class="table table-striped table-y-border"  id="idtablanuevosproductos" name="tabla">
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
                        <button style="margin-left:10px" class=" btn btn-primary" type="button" data-toggle="modal" onclick="" data-target="#AddProductNuevo">Nuevo Producto</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar Tratamiento</button>
                    </div>
                </div>
            </div>
        </div>



<!-- Modal Para agregar nuevos Productos a tratamientos existentes -->
        <div class="modal fade" id="AddProductNuevo" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                                        <?php echo form_dropdown("selProduct",$products,'','class="form-control" id="selectproductsnuevo" placeholder="Productos"') ?>
                                        <input  type="text" class="form-control" placeholder="Dosis" id="iddosisnuevo" name="dosis" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Común" id="idnombrecomunnuevo" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Científico" id="idnombrecientificonuevo" name="nombrecientifico" required/>            
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
                                        <input type="text" class="form-control" placeholder="Secado" id="idsecadonuevo" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Cosecha" id="idcosechanuevo" name="nombrecientifico" required/>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" id="agregarProductoNuevo">Agregar</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre del modal de productos -->

        <!-- Modal Para editar Productos de tratamientos guardados -->
        <div class="modal fade" id="EditProductNuevo" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Editar Producto</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-6">
                            <div class="panel panel-primary panel-md">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Datos del Producto</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input  type="text" class="form-control" placeholder="Producto" id="editselectproducts" readonly="readonly" name="product" required/>
                                        <input  type="text" class="form-control" placeholder="Dosis" id="editiddosis" name="dosis" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Común" id="editidnombrecomun" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Científico" id="editidnombrecientifico" name="nombrecientifico" required/>            
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
                                        <input type="text" class="form-control" placeholder="Secado" id="editidsecado" name="nombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Cosecha" id="editidcosecha" name="nombrecientifico" required/>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" data-dismiss="modal" id="editarProducto">Actualizar</button>
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
