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
                <li><a href="#">Usuarios</a></li>
                <li class="active">Lista Usuarios</li>
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
                    <h3>Lista de Usuarios</h3>
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
                        <div class="panel-heading">Usuarios en el Sistema</div>
                            <div class="panel-body">		
								<div class="starter-template">
									<div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
											<thead>
                                                <tr>
													<th>Nombre Usuario</th>
													<th>Nombre</th>
													<th>Correo</th>
													<th>Estado</th>
													<th></th>
													<th></th>
												</tr>
                                            </thead>
                                            <tbody>
                                                <?php
													foreach ($users as $row) 
													{
														if ($row->username=="admin") {
														}
														else{
													?>
													        <tr>
													 	        <td><?=$row->username?></td>
													 	        <td><?=$row->realname?></td>
													 	        <td><?=$row->email?></td>
													 	        <?php if ($row->active==1) {
													 	        ?>
													 	            <td>True</td>
													 	            <td> 
													 	            	<a href="" class="btn btn-default btn-circle2" onClick="id_users('<?=$row->id?>')" data-toggle="modal" data-target="#edit">
													 	            		<span class="glyphicon glyphicon-edit">
													 	            		</span>&nbsp;
													 	            	</a>
													 	            </td>
													 	            <td>
													 	            	<a href="" class="btn btn-default btn-circle2" onClick="id_users('<?=$row->id?>')" data-toggle="modal" data-target="#active">
													 	            		<span class="glyphicon glyphicon-remove">
													 	            		</span>&nbsp;
													 	            	</a>
													 	            </td>
													 	        <?php
													 	          }
													 	          else{
													 	        ?>
													 	            <td>False</td>
													 	            <td>
													 	            	<a href="" class="btn btn-default btn-circle2" onClick="id_users('<?=$row->id?>')" data-toggle="modal" data-target="#edit">
													 	            		<span class="glyphicon glyphicon-edit">
													 	            		</span>&nbsp;
													 	            	</a>
													 	            </td>
													 	            <td>
													 	            	<a href="" class="btn btn-default btn-circle2" onClick="id_users('<?=$row->id?>')" data-toggle="modal" data-target="#active">
													 	            		<span class="glyphicon glyphicon-remove">
													 	            		</span>&nbsp;
													 	            	</a>
													 	            </td>
													 	        <?php 
													 	          }
													 	        ?>
													 </tr>

								                    <?php
								                        }
													}
													?>
                                            </tbody>
                                        </table>
										<div class="modal fade" id="active"  tabindex="1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close " data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
						                                <h4>Activar/Desactivar o Eliminar Usuario</h4>
													</div>
													<div class="modal-body">
														<form class="form-signin">
															<div>
																<label>Nombre de Usuario: </label>
																<label id="username"></label>
															</div>
															<div>
																<label>Nombre: </label>
																<label id="name"></label>
															</div>
															<div>
																<label>Correo: </label>
																<label id="email"></label>
															</div>
															<div>
																<label>Estado: </label>
																<label id="activer"></label>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button class=" btn btn-primary" type="button" onClick="acti_dascti_user()" data-dismiss="modal">Activate/Desactivate</button>
														<button class=" btn btn-primary" type="button" onClick="delete_user()" data-dismiss="modal">Delete</button>
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="edit"  tabindex="1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close " data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;</button>
						                                <h4> Editar Usuario </h4>
													</div>
													<div class="modal-body">
														<?php echo form_open('user/callupdate',array('class'=>'form-signin'));?>
															<div>
																<input style='display:none' name="idi" class="form-control" id="idi" type="text"/>
															</div>
															<div>
																<label>Nombre usuario: </label>
																<input name="usernamei" class="form-control" id="usernamei" type="text"/>
															</div>
															<div>
																<label>Nombre: </label>
																<input name="namei" class="form-control" type="text" id="namei"/>
															</div>
															<div>
																<label>Correo: </label>
																<input name="emaili" type="text"class="form-control" id="emaili"/>
															</div>
															<button  style="margin-top:10px" class=" btn btn-primary" type="submit">Update</button>
														</form>
													</div>
													<div class="modal-footer">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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