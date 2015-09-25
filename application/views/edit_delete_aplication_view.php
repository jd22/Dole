
<body>
    <div class="container">
      	<div class="starter-template">
	        <?php echo form_open('Edit_delete_Aplication/update_aplicacion');?>
	        	<?php
					foreach ($apli as $row) 
					{
						$ci = &get_instance();
						$ci->load->model("aplication_model");
						$ci->load->model('tratament_model');
       					$ci->load->model('dosis_model');
       					$ci->load->model('product_model');
       					$tratamiento=$ci->tratament_model->get_tratamientos_apli($row->id);
       					
				?>
	        	<div class="container-fluid">
	        		<table class="table">
	        				<tr>
	        					<td class="col-md-6">
							  	    <div class="">
							  		    <div class="form-group panel panel-primary">
									        <div class="panel-heading">Cabezera</div>
									  		<div class="panel-body">
									  			<div class="form-group">
									  				<input type="text" class="form-control" value="<?=$row->id?>" id="id_a" name="id_a" style='display:none'/>
									  			</div>
									  			<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Número_Proyecto?>" placeholder="Númmero de Proyecto" name="number_proyect" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<?php echo form_label("Fincas: ",'class="label label-primary"'), form_dropdown("selLands",$lands,'','class="form-control" id="lands"') ?>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Descripcion?>" placeholder="Descripción" name="description" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Semana_Aplicacion?>" placeholder="Semana de Aplicación" name="week_aplication" required=""/>
								                </div>
								                <div class="form-group">
								                	<input type="text" class="form-control" value="<?=$row->fecha_programada?>" placeholder="Fecha de Aplicación" name="scheduled" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" style="display:none;" placeholder="Week Post Seeding" name="week_post_seeding"/>
									  			</div>
									  		</div>
										</div>
									</div>
									<div class="">
						        			<div class="panel panel-primary">
									  			<div class="panel-heading">Información del Bloque</div>
									  			<div class="panel-body">
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Lote?>" placeholder="Lote" name="batch" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Bloque?>" placeholder="Bloque" name="block" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Estadio?>" placeholder="Estadio" name="stadium" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Semana_Siembra?>" placeholder="Semana de Siembra" name="week_seeding" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Area_Bloque?>" placeholder="Área del Bloque" name="block_area"/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Area_Proyecto?>" placeholder="Área del Proyecto" name="proyect_area" required=""/>
									  				</div>
									  				<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->cultivo?>" placeholder="Tipo de Cultivo" name="culti_type" required=""/>
									  				</div>
									  				<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Variedad?>" placeholder="Variedad del Cultivo" name="product_range" required=""/>
									  				</div>
									  			</div>
											</div>
									</div>
									<div class="">
						        			<div class="panel panel-primary">
									  			<div class="panel-heading">Dimensión de la Parcela</div>
									  			<div class="panel-body">
									  				<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Camas?>" placeholder="Número de Camas" name="num_beds" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Ancho_Camas?>" placeholder="Ancho de las Camas(m)" name="beds_width" required=""/>
									    			</div>
									    			<div class="form-group">
									    				<input type="text" class="form-control" value="<?=$row->Longitud_Camas?>" placeholder="Largo de las Parcelas(m)" name="plots_length" required=""/>
									  				</div>
									  			</div>
											</div>
								   	</div>
								   	<div class="">
						        			<div class="panel panel-primary">
									  			<div class="panel-heading">Información de Calibración</div>
									  			<div class="panel-body">
									  				<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->litros?>" placeholder="Litros" name="litros" required=""/>
									    			</div>
									  				<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Presion?>" placeholder="Presión(PSI)" name="presion" required=""/>
									    			</div>
									    			<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Velocidad?>" placeholder="Velocidad(km/h)" name="velocidad" required=""/>
									    			</div>
									    			<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->rpm?>" placeholder="R.P.M" name="r_p_m" required=""/>
									    			</div>
									    			<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Marcha?>" placeholder="Marcha" name="marcha" required=""/>
									    			</div>
									    			<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Boquilla?>" placeholder="Tipo de Boquilla" name="boquilla" required=""/>
									  				</div>
									  			</div>
											</div>
								   	</div>
								</td>
								<td class="col-md-6">
									<div class="">
										<div class="panel panel-primary">
									  		<div class="panel-heading">Tratamientos</div>
									  		<div class="panel-body">
									  			<table class="table table-hover" id="Trataments">
									  				<tr>
									  					<th>
									  						#
									  					</th>
											 			<th>
											 				Producto Comercial
											 			</th>
											 			<th>
											 				Ingrediente Activo
											 			</th>
											 			<th>
											 				Dosis
											 			</th>
											 			<th>
											 				Unidad
											 			</th>
											 			<th>
											 				Intervalo Secado
											 			</th>
											 			<th>
											 				Intervalo cosecha
											 			</th>
											 		</tr>
											 		<?php
											 			$count=1;
											 			foreach ($tratamiento->result() as $row1) 
								       					{
								       						$secado=$row1->Secado;
								       						$cosecha=$row1->Cosecha;
								       						$dosisdb=$ci->dosis_model->get_dosis($row1->id);
								       						$primero=1;
								       						foreach ($dosisdb->result() as $row2) 
								       						{
								       							$dosis=$row2->dosis;
								       							$producto=$ci->product_model->get_product2($row2->id_product);
								       							foreach ($producto->result() as $row3) 
								       							{
								       								if($primero==1)
								       								{
								       				?>
								       									<tr>
								       										<td><?= $count?></td>
								       										<td><?= $row3->name?></td>
								       										<td><?= $row3->activecomponent?></td>
								       										<td><?= $dosis?></td>
								       										<td><?= $row3->unit?></td>
								       										<td><?= $secado?></td>
								       										<td><?= $cosecha?></td>
								       									</tr>
								       				<?php
								       									$primero=0;
								       									$count++;
								       								}
								       								else
								       								{
								       				?>
								       									<tr>
								       										<td></td>
								       										<td><?= $row3->name?></td>
								       										<td><?= $row3->activecomponent?></td>
								       										<td><?= $dosis?></td>
								       										<td><?= $row3->unit?></td>
								       										<td><?= $secado?></td>
								       										<td><?= $cosecha?></td>
								       									</tr>	
								       				<?php		
								       								}
								       									
								       							}
								       						}
								       						
								       					}
											 		 ?>
									  			</table>
									  		</div>
										</div>
									</div>
									<div class="">
										<div class="panel panel-primary">
									  		<div class="panel-heading">Información Adicional</div>
									  		<div class="panel-body">
									  			<div class="form-group">
									    			<input type="text" id="num_treataments"  class="form-control" value="<?=$row->Cantidad_Tratamientos?>" placeholder="Número de Tratamientos" name="num_treataments"/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Modo_Aplicacion?>" placeholder="Modo de Aplicación" name="mode_aplication" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Parcelas?>" placeholder="Número de Parcelas" name="num_plots" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Replicas?>" placeholder="Número de Replicas" name="num_replicas" required=""/>
									    		</div>
									    		<div class="form-group">
									    			<input type="text" class="form-control" value="<?=$row->Volumen_Aplicacion?>" placeholder="Volúmen de Aplicación" name="aplication_volume" required=""/>
									  			</div>
									  		</div>
										</div>
									</div>
								</td>	
							</tr>
				    </table>	  	
				    <div class="col-md-6">
					    <button type="summit"  class="btn btn-lg btn-primary">Editar Aplicación</button>
					</div>
					</form>
					<div class="col-md-6">
						<?php echo form_open('Edit_delete_Aplication/delete_aplication');?>
							<input type="text" class="form-control" value="<?=$row->id?>" id="id_a" name="id_e" style='display:none'/>
					    	<button type="summit" class="btn btn-lg btn-primary">Eliminar Aplicacaión</button>
						</form>
					</div>
					<?php
						}
					?>
				</div>
    	</div>
    </div><!-- /.container -->

</body>