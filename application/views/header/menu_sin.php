            
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