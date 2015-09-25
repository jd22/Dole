<body>

 <div class="container">
 	<div class="starter-template">
	 	<div class="form-signin">
		    <div class="alert alert-success contact-warning">
		        <p>
		        	Éxito!
		        </p>
		    </div>
	    </div>
    </div>
    </div><!-- /.container -->

<?php 
  ob_start(); 
  header("refresh: 1; url = Home");
  ob_end_flush();?>
</body>