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
                    <div class="panel panel-success">
                        <div class="panel-heading">Productos Actuales</div>
                            <div class="panel-body">   
                               <div class="starter-template">
                                 <div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Ingrediente activo</th>
                                                    <th>Unidad</th>
                                                    <th>Opciones Extras</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($productos as $row) 
                                                {
                                            ?>
                                                <tr>
                                                    <td><?=$row->name?></td>
                                                    <td><?=$row->activecomponent?></td>
                                                    <td><?=$row->unit?></td>
                                                   <td style="text-align:center">
                                                        <a href="#" onclick="cargarProducto(<?=$row->id_producto?>)">Editar</a>
                                                    </td>
                                               </tr>
                                            <?php
                                                }    
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Modal Para editar Productos -->
        <div class="modal fade" id="actualizarProducto" style="background:rgba(0, 0, 0, 0.5);" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-ms">
                <div class="modal-content">
                    <div class="modal-header  modal-header-info" style="background-color: #0F3D4E;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
                        <h4 style="color:white;" class="panel-title">Producto </h4>
                    </div>

                    <div class="model-body" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="panel panel-info panel-sm">
                                <div class="panel-body">
                                    <div class="starter-template">
                                        <input id="idPro" type="text" hidden>
                                        <div class="form-group">
                                            <input id="nameproductoedit" type="text" class="form-control" placeholder="Nombre" >
                                        </div>
                                        <div class="form-group">
                                            <input id="activeproductoedit" type="text" class="form-control" placeholder="Ingrediente Activo" >
                                        </div>
                                        <div class="form-group">
                                            <input id="unitproductoedit" type="text" class="form-control" placeholder="Unidad" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn btn-primary" type="button" id="actualizarP">Actualizar</button>
                        <button class=" btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        </section>
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
$(document).ready(function() {
    $('.datatable').DataTable({
        "sPaginationType": "bs_four_button",
        "oLanguage": { 
            "oPaginate": { 
            "sPrevious": "Ant", 
            "sNext": "Sig", 
            "sLast": "Ult", 
            "sFirst": "Prim" 
            },
        "sLengthMenu": 'Mostrar <select>'+ 
        '<option value="10">10</option>'+ 
        '<option value="20">20</option>'+ 
        '<option value="30">30</option>'+ 
        '<option value="40">40</option>'+ 
        '<option value="50">50</option>'+ 
        '<option value="-1">Todos</option>'+ 
        '</select> registros', 

        "sInfo": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)", 

        "sInfoFiltered": " - filtrados de _MAX_ registros", 

        "sInfoEmpty": "No hay resultados de búsqueda", 

        "sZeroRecords": "No hay registros a mostrar", 

        "sProcessing": "Espere, por favor...", 

        "sSearch": "Buscar:", 
    }
   }); 
    $('.datatable').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });
});
</script>

        <!-- Theme script -->
        <script src="<?=base_url()?>js/scripts.js" type="text/javascript"></script>
        <script src="<?=base_url()?>js/Dole/dole.js" type="text/javascript"></script>