<body>
	<div class="container">

        <div class="starter-template">
            <?php echo form_open('ChangePassword',array('class'=>'form-signin'));?>
            <h2>Cambiar Contraseña</h2>
            <p class="alert alert-danger contact-warning">
                <?php if($dias>=30)
                      {
                        echo $msj2;
                      }
                      else
                      {
                        echo $msj1;
                      }
                ?>
            </p>
        	<div class="form-group">
        		<input title=""type="password" class="form-control" placeholder="Contraseña Reciente" name="recentpassword" required="">
        		
        	</div>
            <div class="form-group" style="display:none">
                <input type="text" class="form-control" name="id" required="" value=<?php echo $id?>>
            </div>
        	<div class="form-group">
        	    <input type="password" class="form-control" placeholder="Nueva Contraseña" name="newpassword" required="">
        	</div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="confpass" required="">
            </div>
        	<?php echo form_error('recentpassword','<div class="alert alert-danger contact-warning">','</div>')?>
        	
        	<div class="form-group">
				<button type="submit" class="btn btn-lg btn-primary btn-block">Cambiar Contraseña</button>
			</div>
        </form>
      </div>
    </div><!-- /.container -->
</body>