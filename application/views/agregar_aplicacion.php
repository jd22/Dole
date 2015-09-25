<div class="container-fluid container-padded dash-controls">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Aplicaciones</a></li>
                <li class="active">Nueva Aplicación</li>
            </ol>
        </div>
    </div><p></p>
</div>
<!-- Main content start -->
<div class="container-fluid container-padded">
    <div class="row">
        <?php echo form_open('Aplication/confirm_aplication');?>
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">General</h3>
                </div>
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label>Numero de Proyecto:</label>
                        <input type="number" value="1" min="1" class="form-control" placeholder="Número de Proyecto" id="number_proyect" name="number_proyect" required/>
                    </div>
                    <div class="form-group">
                        <?php echo form_label("Elegir Finca: ",'class="label label-primary"'), form_dropdown("selLands",$lands,'','class="form-control" id="lands"') ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Semana de Aplicacaión Ej: 21-2015" id="week_aplication" name="week_aplication" required/>
                    </div>
                    <div class="form-group">
                        <?php echo form_label("Descripción: ",'class="label label-primary"'), form_dropdown("selDescriptions",$descriptions,'','class="form-control" id="description"') ?>
                        <!-- <input type="select" class="form-control" placeholder="Descripción" id="description" name="description" required/> -->
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Fecha de Aplicación" readonly id="scheduled" name="scheduled"  required/>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Fecha de Aplicación" id="scheduled" name="scheduled" />
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control" style="display:none;" placeholder="Week Post Seeding" id="week_post_seeding" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Información del bloque</h3>
                </div>
                <div class="panel-body">
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
        <div class="col-md-12">
            <div class="panel panel-primary">
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
        <div class="col-md-12">
            <div class="panel panel-primary">
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

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Tratamientos</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover" id="Trataments">
                        <tr>
                            <th>#</th>
                            <th>Producto Comercial</th>
                            <th>Ingrediente Activo</th>
                            <th>Dosis</th>
                            <th>Unidad</th>
                            <th>Intervalo Secado</th>
                            <th>Intervalo cosecha</th>
                        </tr>
                    </table>
                    <button class=" btn btn-primary" type="button" onclick="desabilidarbtn('btnaddTratament')" data-toggle="modal" data-target="#NewTratament"> Agregar Tratamiento</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Información adicional</h3>
                </div>
                <div class="panel-body">
                    <div class="form-inline">
                            <div class="form-group">
                                <input type="number" id="num_treataments" class="form-control" placeholder="Número de Tratamientos" name="num_treataments" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Modo de Aplicación" id="mode_aplication" name="mode_aplication" required/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Número de Parcelas" id="num_plots" name="num_plots" required/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Número de Replicas" id="num_replicas" name="num_replicas" required/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Volumen de Aplicación" id="aplication_volume" name="aplication_volume" required/>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <div style="margin-bottom:20px" class="form-signin">
            <button type="summit" class="btn btn-lg btn-primary">Agregar Aplicación</button>
        </div>
        <div class="modal fade" id="NewTratament" tabindex="1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-info">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 style="color:white;" class="panel-title">Nuevo Tratamiento</h4>
                    </div>

                    <div class="model-body">
                        <table class="table table-striped table-y-border" id="Tratament" name="tabla">
                            <tr>
                                <th>Producto Comercial</th>
                                <th>Ingrediente Activo</th>
                                <th>Dosis</th>
                                <th>Unidad</th>
                                <th>Intervalo Secado</th>
                                <th>Intervalo cosecha</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" id="secado" class="form-control" placeholder="Secado" name="secado" required/>
                                </td>
                                <td>
                                    <input type="text" id="cosecha" class="form-control" placeholder="Cosecha" name="cosecha" required/>
                                </td>
                            </tr>
                        </table>
                        <button style="margin-left:10px" class=" btn btn-primary" type="button" data-toggle="modal" onclick="" data-target="#AddProduct"> Agregar Producto</button>
                    </div>
                    <div class="modal-footer">
                        <button id="btnaddTratament" class=" btn btn-primary" type="button" disabled="" onclick="AddTratament()" data-dismiss="modal">Agregar</button>
                        <button class=" btn btn-primary" type="button" onclick="Close()" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Agregar Producto</h4>
                    </div>

                    <div class="model-body" style="margin-left:20px;margin-right:20px">
                        <form class="form-signin" >
                            <?php echo form_label("Productos: "), form_dropdown("selProduct",$products,'','class="form-control" id="products"') ?>
                            <input id="dosis" type="text" class="form-control" placeholder="Dosis" name="dosis" required/>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" onclick="AddRowTable()" data-dismiss="modal">Agregar</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url()?>js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/pages/form_advanced.js" type="text/javascript"></script>
