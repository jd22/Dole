<link rel="stylesheet" href="<?=base_url()?>css/lib/bootstrap/bootstrap.css" />

<!-- Font Awesome style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/font-awesome/font-awesome.min.css">

<!-- Ionicons style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/ionicons/ionicons.min.css">

<!-- Date range picker style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/daterangepicker/daterangepicker-bs3.css" />

<!-- Page specific style sheet -->

<link href="css/lib/clockpicker/clockpicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>css/lib/jasny/jasny-bootstrap.min.css" />
<link rel="stylesheet" href="<?=base_url()?>css/lib/slider/slider.css" />
<link rel="stylesheet" href="<?=base_url()?>css/lib/daterangepicker/daterangepicker-bs3.css" />
<link href="<?=base_url()?>css/lib/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
<link href="<?=base_url()?>css/lib/iCheck/all.css" rel="stylesheet" type="text/css" />

<!-- Tab drop style sheets -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/tabdrop/tabdrop.css" />

<!-- Theme specific style sheets -->
<link rel="stylesheet" href="<?=base_url()?>css/styles.css" id="theme-css" />

<div class="container-fluid container-padded dash-controls">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Proyectos</a></li>
                <li class="active">Nuevo Proyecto</li>
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
                    <h3>Información General</h3>
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
                                    <label>Número de Proyecto:</label>
                                    <div class="form-inline">
                                       <?php 
                                       if ($idproyecto!=-1){
                                        ?>
                                            <input type="text" id="nnumero" value='<?=$idproyecto?>' class="form-control" placeholder="Numero de Proyecto" name="numero" required="">
                                        <?php
                                        } else { 
                                        ?>
                                            <input type="text" id="nnumero" class="form-control" placeholder="Numero de Proyecto" name="numero" required="">
                                            <input type="button" id="agregarProyecto" class="btn btn-sm btn-success" value="Crear Proyecto" />
                                        <?php
                                        }
                                        ?>
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
                        <div class="starter-template">
                            <div class="table-responsive">
                                <table id="Trataments" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="color:white;background:#108CAE" >Nº Tratamiento</th>
                                            <th style="color:white;background:#108CAE">Cédula Aplicación</th>
                                            <th style="color:white;background:#108CAE">Mapa</th>
                                            <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm" style="float:right"  type="button" onclick="cargarTratamientosExistentes()" id="modalAgregarProductoExiste" data-toggle="modal" data-target="#NewTratamentExiste">Tratemiento Existente</button>
                        <button class="btn btn-primary btn-sm" style="float:right" type="button" id="modalAgregarProducto" data-toggle="modal" data-target="#listaProductos">Nuevo Tratamiento</button>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
        


    

        <!-- Modal Para agregar Productos -->
        <div class="modal fade" id="listaCedulas" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Cedulas de Aplicacion <label style="float: right;margin-right: 9px;margin-top: 3px;color: rgb(54, 175, 208);font-size: 14px;" id="idtra">Tratamiento: </label> </h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-sm">
                                <div class="panel-body">
                                    <div class="starter-template">
                                        <div class="table-responsive">
                                            <table id="tablaCedulas" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="color:white;background:#108CAE">Nº Cedula Aplicación</th>
                                                        <th style="color:white;background:#108CAE">Descripción</th>
                                                        <th style="color:white;background:#108CAE">Sem. Aplicación</th>
                                                        <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                                        <th style="text-align: center;color:white;background:#108CAE">Descargar Documento</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
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


        <!-- Modal Para los calculos de la cedula de aplicacion -->
    <div class="col-md-12">
        <div class="modal fade" id="calculos" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" data-keyboard="false">
            <div class="modal-dialog modal-xs" style="float: right;width:450px;margin-top: 3px;">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                         <h4 style="color:white;" class="panel-title">Cálculos de Aplicación</h4>
                    </div>

                    <div class="model-body">
                        
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="form-control">Número Replc.</label>
                                            <input type="text" class="form-control" placeholder="Número Replc. " id="idnumeroreplica" name="idnumeroreplica" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Area de Aplicación.(m2)</label>
                                            <input type="text" class="form-control" placeholder="Area de Aplicación.(m2)" id="idareaaplicacion" name="idareaaplicacion" required=""/>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control">Area calculada por Replica  (m2)</label>
                                            <input type="text" class="form-control" placeholder="Area calculada por Replica  (m2)" id="idareacalculada" name="idareacalculada" required=""/>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control">Volumen de Apl. (L ha-1)</label>
                                            <input type="text" class="form-control" placeholder="Volumen de Apl. (L ha-1)" id="idvolaplicacion" name="idvolaplicacion" required=""/>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control">VLts. Agua x aplicación</label>
                                            <input type="text" class="form-control" placeholder="Lts. Agua x aplicación" id="idaguaporaplicacion" name="idaguaporaplicacion" required=""/>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control">Capacidad Tanque (L)</label>
                                            <input type="text" class="form-control" placeholder="Capacidad Tanque (L)" id="idcapacidadtanque" name="idcapacidadtanque" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Area Buffer (m2)</label>
                                            <input type="text" class="form-control" placeholder="Area Buffer (m2)" id="idareabuffer" name="idareabuffer" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Tanques requeridos</label>
                                            <input type="text" class="form-control" placeholder="Tanques requeridos" id="idtanquesrequeridos" name="idtanquesrequeridos" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Volumen tanque 1</label>
                                            <input type="text" class="form-control" placeholder="Volumen tanque 1" id="idvolumentanque1" name="idvolumentanque1" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Volumen tanque 2</label>
                                            <input type="text" class="form-control" placeholder="Volumen tanque 2" id="idvolumentanque2" name="idvolumentanque2" required=""/>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Creacion del modal para agregar una cedula de aplicacion -->
        <div class="modal fade" id="NuevaCedula" style="background-color: rgba(0, 0, 0, 0.26);" tabindex="1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg" style="margin-top: 3px;float: left;">
                <div class="modal-content">
                    <div class="modal-header modal-header-success" style="background:#3E448A;">
                         <button id ="cerrarcedula" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cant. Tratamientos" id="idnumerotratamientos" name="idnumerotratamientos" required=""/>
                                        </div> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cant. Replicas" id="idnumeroreplicas" name="idnumeroreplicas" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Cant. Parcelas" id="idnumeroparcelas" name="idnumeroparcelas" required=""/>
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
                        <button id="agregarCedula" class=" btn btn-primary" type="button">Crear Cédula</button>
                        <button id="actualizarCedula" class=" btn btn-primary" type="button">Actualizar Cédula</button>
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
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Productos del Tratamiento</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-md">
                                <div class="panel-body">
                                    <label><input id="idpredeterminado" type="checkbox" class="minimal-red"/> Predeterminado</label>
                                         
                                    <div class="starter-template">

                                        <div class="table-responsive">
                                            <table id="idproductos" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="color:white;background:#108CAE">Producto Comercial</th>
                                                        <th style="color:white;background:#108CAE">Ingrediente Activo</th>
                                                        <th style="color:white;background:#108CAE" hidden >Dosis</th>
                                                        <th style="color:white;background:#108CAE">Unidad</th>
                                                        <th style="color:white;background:#108CAE">Inter. Secado</th>
                                                        <th style="color:white;background:#108CAE">Inter. Cosecha</th>
                                                        <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                         
                                    </div>
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


        <!-- Modal Para agregar imagen -->
        <div class="modal fade" id="agregaImagen" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Mapa del terreno</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-md">
                                <div class="panel-body">
                                    <div class="starter-template">



                            
                                
                                    <?php echo form_open_multipart('Proyecto/upload/');?>

                                    <fieldset>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="filename" class="control-label">Seleccione la imagen del mapa</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="fileinput fileinput-new" data-provides="fileinput" name="foto">
                                            <div>
                                                <input type="text" id="idTrata" name="id_trata"  style="visibility:hidden"></input>
                                                <!--<img id"imagen_View" heigh="320px" width="400px" src="<?=base_url()?>images/user2.png">-->
                                            </div>                                            
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="file" name="filename" size="20" id="filena"/>
                                                    <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Guardar mapa" style="margin-left:10px" class="btn btn-primary"/>
                        <?php echo form_close(); ?>
                                    <?php if (isset($success_msg)) { echo $success_msg; } ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cierre modal agregar imagen -->


        <!-- Modal Para agregar Productos -->
        <div class="modal fade" id="AddProduct" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
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
                                        <input  type="text" class="form-control" placeholder="Dosis" id="iddosis" name="dosis" style="display: none;"/>
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
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Productos del Tratamiento</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-md">
                                <div class="panel-body">
                                    <label><input id="idpredeterminadoNuevo" type="checkbox" class="minimal-red"/> Predeterminado</label>
                                    <div class="starter-template">
                                        <div class="table-responsive">
                                            <table id="idtablanuevosproductos" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="color:white;background:#108CAE">Producto Comercial</th>
                                                        <th style="color:white;background:#108CAE">Ingrediente Activo</th>
                                                        <!-- <th style="color:white;background:#108CAE">Dosis</th> -->
                                                        <th style="color:white;background:#108CAE">Unidad</th>
                                                        <th style="color:white;background:#108CAE">Inter. Secado</th>
                                                        <th style="color:white;background:#108CAE">Inter. Cosecha</th>
                                                        <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>    
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
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
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
                                        <input  type="text" class="form-control" placeholder="Dosis" id="iddosisnuevo" name="iddosisnuevo" style="display: none;" />
                                        <input type="text" class="form-control" placeholder="Nombre Común" id="idnombrecomunnuevo" name="idnombrecomunnuevo" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Científico" id="idnombrecientificonuevo" name="idnombrecientificonuevo" required/>            
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
                                        <input type="text" class="form-control" placeholder="Secado" id="idsecadonuevo" name="idsecadonuevo" required/>
                                        <input type="text" class="form-control" placeholder="Cosecha" id="idcosechanuevo" name="idcosechanuevo" required/>            
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
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
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
                                        <!-- <input  type="text" class="form-control" placeholder="Producto" id="editselectproducts" readonly="readonly" name="product" required/> -->
                                        <?php echo form_dropdown("selProduct",$products,'','class="form-control" id="editselectproducts" placeholder="Productos"') ?>
                                        <input  type="text" class="form-control" placeholder="Dosis" id="editiddosis" name="editiddosis" style="display: none;"/>
                                        <input type="text" class="form-control" placeholder="Nombre Común" id="editidnombrecomun" name="editidnombrecomun" required/>
                                        <input type="text" class="form-control" placeholder="Nombre Científico" id="editidnombrecientifico" name="editidnombrecientifico" required/>            
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
                                        <input type="text" class="form-control" placeholder="Secado" id="editidsecado" name="editidsecado" required/>
                                        <input type="text" class="form-control" placeholder="Cosecha" id="editidcosecha" name="editidcosecha" required/>            
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


<!-- Modal Para agregar tratamientos existentes -->
        <div class="modal fade" id="NewTratamentExiste" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Tratamientos Predeterminados</h4>
                    </div>

                    <div class="model-body">
                        
                            <div class="panel panel-info panel-sm">
                                <div class="panel-body">
                                    <div class="starter-template">
                                        <div class="table-responsive">
                                            <table id="tablaTratamientoExistente" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="color:white;background:#108CAE">Nº Proyecto</th>
                                                        <th style="color:white;background:#108CAE">Nº Tratamiento</th>
                                                        <th style="color:white;background:#108CAE">Productos del Tratamiento</th>
                                                        <th style="color:white;background:#108CAE">Nº Cedula Aplicación</th>
                                                        <th style="text-align: center;color:white;background:#108CAE">Opciones Extras</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>

                    <!-- <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar Tratamientos</button>
                    </div> -->
                </div>
            </div>
        </div>





    </div>
    </section>
</div>
<script src="<?=base_url()?>js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/pages/form_advanced.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/tabdrop/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/jasny/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/mask/jquery.mask.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/slider/bootstrap-slider.js" type="text/javascript"></script>

<script src="<?=base_url()?>js/lib/momentjs/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/timepicker/bootstrap-timepicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/clockpicker/clockpicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
