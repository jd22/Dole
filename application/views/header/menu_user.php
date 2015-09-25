            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
              <ul class="nav navbar-nav">
                <li class=""><a href="<?=base_url()?>index.php/Home">
                  <span class="glyphicon glyphicon-th-large"></span>&nbsp;
                  Home</a>
                </li>
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="glyphicon glyphicon-th-list"></span>&nbsp;
                  Aplicacion</a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="<?=base_url()?>index.php/Aplication"> 
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;
                        Agregar Aplicacion
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="glyphicon glyphicon-th-list"></span>&nbsp;
                  Cedulas Aplicacion</a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="<?=base_url()?>index.php/Cedula"> 
                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;
                        Ver Cedulas
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                    </li>
                  </ul>
                </li>
                <li><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="glyphicon glyphicon-th-list"></span>&nbsp;
                  Productos</a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="<?=base_url()?>index.php/Product"> 
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;
                        Agregar Producto
                      </a>
                    </li>
                    <li class="divider"></li>
                  </ul>
                </li>
                <li><a href="<?=base_url()?>index.php/Calendar">
                  <span class="glyphicon glyphicon-calendar"></span>&nbsp;
                  Ver Calendario</a>
                </li>
              </ul>
              <div id="menulogout">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <span class="glyphicon glyphicon-user"></span>&nbsp;
                      <?php echo $realname?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?=base_url()?>">
                        <span class="glyphicon glyphicon-share"></span>&nbsp;
                        Salir</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="<?=base_url()?>index.php/ChangePassword">
                        <span class="glyphicon glyphicon-edit"></span>&nbsp;
                        Cambiar Contraseña</a>
                      </li>
                      <li class="divider"></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div><!--/.nav-collapse -->
  </div>
</nav>