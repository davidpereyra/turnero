<<<<<<< HEAD
<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        ***********************************************************************************************************************************************************        -->
    
=======

    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
<<<<<<< HEAD
          <p class="centered"><a href="?c=usuario&a=UserProfile"><img src="assets/img/profiles/user/<?php echo $usuario->imgUsuario; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered">
            <?php            
              echo  $usuario->nombreReal. " ". $usuario->apellidoReal . "<br>";
              echo "Puesto Nº: ". $_SESSION['puesto']. "<br>";       
            ?>
          </h5>         

          <li class="sub-menu">
            <a href="?c=usuario&a=InicioDash">
              <i class="fa fa-arrow-circle-right"></i>
              <span>Atención de turnos</span>
              </a>            
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Historico de llamados</span>
              </a>
            <ul class="sub">              
              <li><a href="?c=usuario&a=BuscarHistoricoUsuario"><i class="fa fa-user"></i>De usuario</a></li>
              <li><a href="?c=usuario&a=BuscarHistoricoPerfil"><i class="fa fa-users"></i>Del Sector  </a></li>            
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Estadisticas</span>
              </a>
              <ul class="sub">              
              <li><a href="?c=usuario&a=BuscarEstadisticasUsuario"><i class="fa fa-user"></i>De usuario</a></li>
              <li>
                <a href="?c=usuario&a=#"><i class="fa fa-users"></i>Del Sector</a>
              </li>            
            </ul>            
          </li>
          <!--
            INICIO DATOS GENERICOS PARA VER LOS PERMISOS DE USUARIO
          -->

          <?php 
          
          foreach ($permisosUsuario as $key) {            
            if ($key->idOperacion == $key->idSubOperacion) {?>
                  
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa <?php echo $key->iconoMenu?>"></i>
                  <span><?php echo $key->nombreOperacion;?></span>
                  </a>
                  <?php 
                    foreach ($permisosUsuario as $subKey) {
                      if ($subKey->idOperacion != $subKey->idSubOperacion AND $subKey->idSubOperacion == $key->idOperacion) {
                    
                  ?>
                      <ul class="sub">              
                      
                      <li>
                        <a href="<?php echo $subKey->urlAccion?>"><i class="fa <?php echo $subKey->iconoMenu?>"></i><?php echo $subKey->nombreOperacion;?></a>
                      </li>            
                    </ul>  

                    <?php 
                   } # /if subkey
                  } # /foreach subkey
                  ?>          
              </li>

              <?php 
                   } # /if key
                  } # /foreach key
                  ?> 
          <!--
            FIN DATOS GENERICOS PARA VER LOS PERMISOS DE USUARIO
          -->



=======
          <p class="centered"><a href="profile.html"><img src="assets/img/c.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">
          <?php 
           //print "$_SESSION[usuario]";
           echo "Usuario: ".$_SESSION['usuario'] . "<br>";
           echo "Puesto Nº: ". $_SESSION['puesto'];

           ?>
           </h5>
           
          <!--
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
            <ul class="sub">
              <li><a href="form_component.html">Form Components</a></li>
              <li><a href="advanced_form_components.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="contactform.html">Contact Form</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
              </a>
            <ul class="sub">
              <li><a href="basic_table.html">Basic Table</a></li>
              <li><a href="responsive_table.html">Responsive Table</a></li>
              <li><a href="advanced_table.html">Advanced Table</a></li>
            </ul>
          </li>
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Datos</span>
              <span class="label label-theme pull-right mail-info"> de usuario</span>
              </a>
          </li>-->
          
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->