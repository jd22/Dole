<!-- Bootstrap style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/bootstrap/bootstrap.css" />

<!-- Font Awesome style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/font-awesome/font-awesome.min.css">

<!-- Ionicons style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/ionicons/ionicons.min.css">

<!-- Date range picker style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/daterangepicker/daterangepicker-bs3.css" />

<!-- Page specific style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/datatables/datatables.css">

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
                <li class="active">Programas</li>
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
                    <h3>Programa de Tratamientos  <?php echo $IDproyecto;?> </h3>
                    <hr>
                </div> <!-- col end -->
            </div> <!-- row end -->
        </div>
        <!-- title container end -->
        <!-- section container start -->
        <div class="container-fluid container-padded">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                    <?php
                        $idDias = 1;
                        foreach ($tratamientos->result() as $row) 
                            {
                        ?>
                        <div class="panel-heading" style="color: white;background-color: #3688B8;">
                                <strong style="text-align: left;" > Tratamiento <?=$row->id_tratamiento?></strong>

                                <a style="float: right;color:white"  href="#" onclick="CargarIdTratamiento(<?=$row->id_tratamiento?>,0,'PC-A')" data-toggle="modal" data-target="#NuevaCedula" class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Agregar Cédula">Cédula</a>
                            </div>
                            <div class="panel-body">        
                                <div class="starter-template">
                                    <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" id="<?=$row->id_tratamiento?>">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align:center">Fase de Fertilización <br> Fertilizantes</th>
                                                        <th rowspan="2" style="text-align:center">Orden de <br>Mezclado</th> 
                                                        <th rowspan="2" style="text-align:center">Pre-Siembra <br>kg/ha</th>
                                                        <th style="text-align:center">
                                                            PC-A 
                                                        </th>
                                                        <th style="text-align:center">
                                                            PC-B
                                                        </th>
                                                        <th style="text-align:center">
                                                            PC-C
                                                        </th>
                                                        <th style="text-align:center">
                                                            PC-D
                                                        </th>
                                                        <th style="text-align:center">
                                                            Post-Forza 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5" style="text-align:center">kg de fertilizante/ha/ciclo de aplicación</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $ci = &get_instance();
                                                    $ci->load->model("InformacionTratamiento_model");
                                                    $ci->load->model("product_model");
                                                    $infoTratamientos = $ci->InformacionTratamiento_model->obtener_informacionT($row->id_tratamiento);
                                                foreach ($infoTratamientos->result() as $infoT) 
                                                    {
                                                    if($infoT->tipoCedula =='GENERAL'){
                                                        $producto = $ci->product_model->obtener_producto($infoT->id_producto);
                                                        $nombre = '';
                                                        foreach ($producto->result() as $infoP) 
                                                        {
                                                            $nombre = $infoP->name;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><?=$nombre?></td>
                                                        <td style="text-align:center">0</td>
                                                        <td style="text-align:center">0</td>
                                                        <td style="text-align:center"><input style="text-align:center" type="number" min="0" class="form-control" value="0" id="<?=$infoT->id_informaciontratamiento?>"></td>
                                                        <td style="text-align:center"><input style="text-align:center" type="number" min="0" class="form-control" value="0" id="<?=$infoT->id_informaciontratamiento?>"></td>
                                                        <td style="text-align:center"><input style="text-align:center" type="number" min="0" class="form-control" value="0" id="<?=$infoT->id_informaciontratamiento?>"></td>
                                                        <td style="text-align:center"><input style="text-align:center" type="number" min="0" class="form-control" value="0" id="<?=$infoT->id_informaciontratamiento?>"></td>
                                                        <td style="text-align:center"><input style="text-align:center" type="number" min="0" class="form-control" value="0" id="<?=$infoT->id_informaciontratamiento?>"></td>
                                                    </tr>

                                                    
                                                <?php
                                                    }
                                                }    
                                                ?>
                                                <tr>
                                                    <td>Volumen de aplicación (L/ha)</td>
                                                    <td colspan="2" rowspan="3"> </td>
                                                    <!-- <td colspan="5"> <input type="number" class="form-control" style="text-align:center" placeholder="Cantidad de Litros"> -->
                                                        <?php
                                                                    $ci = &get_instance();
                                                                    $ci->load->model("cedula_model");
                                                                    $cedulas = $ci->cedula_model->obtener_cedulasytipo($row->id_tratamiento,'GENERAL');//obtiene las cedulas del tratamiento
                                                            if($cedulas->num_rows()>=1){
                                                                foreach ($cedulas->result() as $ce) {
                                                                ?>       
                                                                <td colspan="5"> <input disabled="true" type="number" class="form-control" style="text-align:center" placeholder="Cantidad de Litros" value="<?=$ce->volumen_aplicacion?>"> </td>             
                                                            <?php
                                                                break;
                                                                } 
                                                            }
                                                            else {
                                                                ?>
                                                                    <td colspan="5"> <input disabled="true" type="number" class="form-control" style="text-align:center" placeholder="Cantidad de Litros"> </td>             
                                                                <?php
                                                                }
                                                                ?> 
                                                </tr>
                                                <tr>
                                                    <td>Momento de aplicación (DDS)</td>
                                                    
                                                    <td> <input type="text" class="form-control" style="text-align:center" placeholder="Días" value="0" ></td>
                                                    <td> <input type="text" class="form-control" style="text-align:center" placeholder="Días" value="0" ></td>
                                                    <td> <input type="text" class="form-control" style="text-align:center" placeholder="Días" value="0" ></td>
                                                    <td> <input type="text" class="form-control" style="text-align:center" placeholder="Días" value="0" ></td>
                                                    <td> <input type="text" class="form-control" style="text-align:center" placeholder="Días" value="0" ></td>

                                                </tr>
                                                <tr>
                                                    <td> Intervalo de aplicación (días)</td>
                                                    
                                                    <td colspan="4"> <input onchange="idintervalo(<?=$row->id_tratamiento?>)" type="number" min="0" class="form-control" style="text-align:center" placeholder="Invertalo"> </td>
                                                    <td> <input type="number" class="form-control" style="text-align:center" placeholder="Días"></td>
                                                </tr>
                                            </table>
                                            <div> 
                                                <button class=" btn btn-success" style="float:right" type="button" onclick="crearPrograma(<?=$row->id_tratamiento?>,<?=$row->id_proyecto?>)">Crear Programa</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }    
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        <!-- Creacion del modal para agregar una cedula de aplicacion -->
        <div class="modal fade" id="NuevaCedula" style="background-color: rgba(0, 0, 0, 0.26);" tabindex="1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg" style="margin-top: 3px;">
                <div class="modal-content">
                    <div class="modal-header modal-header-success" style="background:#0E2C62;">
                         <!-- <button id ="cerrarcedula" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                         <h4 style="color:white;text-align:center;" class="panel-title">CÉDULA DE APLICACIÓN <label id="tipoCedula"></label> <a href="#" data-toggle="modal" data-target="#listanuevosProductos" onclick="CargarProductosDelTratamientoSinId()" style="float:right">DOSIS</a></h4>
                    </div>
                    <div class="model-body" style="margin-top:5px;">
                        <!-- Opciones Generales -->
                        <div class="col-md-12" style="margin-top: 21px;">
                            <div class="panel panel-primary panel-md">
                                <!-- <div class="panel-heading"> -->
                                <div style="text-align: center;margin-bottom: -4px;">
                                    <h3 class="panel-title" id="numProyecto" style="color: rgb(31, 85, 141);font-size: x-large">PROYECTO <?php echo $N_proyecto;?></h3>
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
                                            <input type="text" class="form-control" readonly placeholder="S. Aplicación: 22-2015" id="idsemanaaplicacion" name="idsemanaaplicacion" required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group" style="width: 280px;">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input class="form-control idfecha" placeholder="Fecha Programada" id="idfechaprogramada" name="idfechaprogramada" readonly required/>
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
                                            <input type="text" class="form-control" placeholder="S Siembra/S cierre Cosecha" id="idsemanasiembra" readonly name="idsemanasiembra" required/>
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
                        <button id="agregarCedula" onclick="agregarCedulafuncion(<?php echo $IDproyecto;?>)" class=" btn btn-primary" type="button">Crear Cédula</button>
                        <button id="actualizarCedula" class=" btn btn-primary" type="button">Actualizar Cédula</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
                        <!-- <button class=" btn btn-primary" type="button" id="cerrarTratamiento" data-dismiss="modal">Cerrar</button> -->
                    </div>


                </div>
            </div>
        </div>
        <!-- Modal Para agregar Nuevos Productos al tratamiento -->
        <div class="modal fade" id="listanuevosProductos" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Productos del Tratamiento</h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-md">
                                <div class="panel-body">
                                    <!-- <label><input id="idpredeterminadoNuevo" type="checkbox" class="minimal-red"/> Predeterminado</label> -->
                                    <div class="starter-template">
                                        <div class="table-responsive">
                                            <table id="idtablanuevosproductos" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="color:white;background:#108CAE">Producto Comercial</th>
                                                        <th style="color:white;background:#108CAE">Ingrediente Activo</th>
                                                        <th style="color:white;background:#108CAE">Dosis</th>
                                                        <th style="color:white;background:#108CAE">Unidad</th>
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
                        <!-- <button style="margin-left:10px" class=" btn btn-primary" type="button" data-toggle="modal" onclick="" data-target="#AddProductNuevo">Nuevo Producto</button> -->
                        <!-- <button class=" btn btn-primary" type="button" data-dismiss="modal" onclick="actualizarDosis()">Guardar</button> -->
                        <button class=" btn btn-primary" type="button" data-dismiss="modal" onclick="actualizarTablaDosis()">Listo</button>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </div>
<!-- ===== JAVASCRIPT START ===== -->
<!-- jQuery script -->
<script src="<?=base_url()?>js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>

<!-- Bootstrap script -->
<script src="<?=base_url()?>js/lib/bootstrap/bootstrap.min.js" type="text/javascript"></script>

<!-- Slim Scroll script -->
<script src="<?=base_url()?>js/lib/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<!-- Date range picker script -->
<script src="<?=base_url()?>js/lib/momentjs/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<!-- Tab drop script -->
<script src="<?=base_url()?>js/lib/tabdrop/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>js/lib/datatables/datatables.js" type="text/javascript"></script>
<script type="text/javascript">
// $(document).ready(function() {
//     $('.datatable').DataTable({
//         "sPaginationType": "bs_four_button",
//         "oLanguage": { 
//             "oPaginate": { 
//             "sPrevious": "Ant", 
//             "sNext": "Sig", 
//             "sLast": "Ult", 
//             "sFirst": "Prim" 
//             },
//     }
//    }); 
//     $('.datatable').each(function(){
//         var datatable = $(this);
//         // SEARCH - Add the placeholder for Search and Turn this into in-line form control
//         var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
//         search_input.attr('placeholder', 'Search');
//         search_input.addClass('form-control input-sm');
//         // LENGTH - Inline-Form control
//         var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
//         length_sel.addClass('form-control input-sm');
//     });
// });
</script>

<!-- Theme script -->
<script src="<?=base_url()?>js/scripts.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/Dole/doleprogramas.js" type="text/javascript"></script>
