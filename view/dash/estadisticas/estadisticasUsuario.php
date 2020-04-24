<body>
  <section id="container">
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper my-5 site-min-height">
        <div class="border-head my-5">
          <h3><i class="fa fa-angle-right"></i>ESTADÍSTICAS DE USUARIO</h3>
        </div>
        <h4>
          <?php
          
          $startDate = date("d/m/Y - H:s", strtotime($fechaDesde));
          $endDate = date("d/m/Y - H:s", strtotime($fechaHasta));
          echo 'Seleccionadas desde el '.$startDate.' hasta el '.$endDate ;
        
          ?>
        <H4>
        <div class="row mt">
          
            
            <div class="col-md-4 col-sm-4 mb"><!-- cantidad clientes atendidos -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">                  
                  <h5>MIS CLIENTES (CANTIDAD)</h5>
                </div>                  
                  <h4><i class="fa fa-dot-circle-o"></i> Llamados:  <?php echo $llamados; ?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Atendidos: <?php echo $atendidos?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Ausentes:  <?php echo $ausentes; ?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Derivados: <?php echo $derivados?></h4>                                    
                <footer>
                  <div class="centered">
                    <h2><i class="fa fa-trophy"></i> </h2>
                  </div>
                </footer>
              </div><!--  /darkblue panel -->              
            </div><!-- /col-md-4 --><!-- /cantidad clientes atendidos -->

            <div class="col-md-4 col-sm-4 mb"><!--  porcentaje clientes atendidos -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">                  
                  <h5>MIS CLIENTES (PORCENTAJE)</h5>
                </div>                  
                  <h4><i class="fa fa-dot-circle-o"></i> Llamados:  <?php echo round($pjeLlamados,2).'%'; ?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Atendidos: <?php echo round($pjeAtendidos,2).'%'; ?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Ausentes:  <?php echo round($pjeAusentes,2).'%'; ?></h4>
                  <h4><i class="fa fa-dot-circle-o"></i> Derivados: <?php echo round($pjeDerivados,2).'%'; ?></h4>                                   
                <footer>
                  <div class="centered">
                    <h2><i class="fa fa-trophy"></i> </h2>
                  </div>
                </footer>
              </div><!--  /darkblue panel -->              
            </div><!-- /col-md-4 --><!--  /porcentaje clientes atendidos -->
              
            <div class="col-md-4 col-sm-4 mb"><!-- col-md-4 col-sm-4 mb Panel redondo-->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>TURNOS CON PERMISOS PARA ATENDER</h5> 
                </div>
                <canvas id="turnosSectorUsuario01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo $pjePerfil;?>,
                        color: "#28A745"
                      },
                      {
                        value: <?php echo 100-$pjePerfil;?>,
                        color: "#6c757d"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("turnosSectorUsuario01").getContext("2d")).Doughnut(doughnutData);
                  </script>                 
                  <footer>
                    <div class="pull-left">
                      <h5>DE: <?php echo $perfil;?></h5>
                    </div>
                    <div class="pull-right">
                      <h5>ATENDISTE: <?php echo round($pjePerfil,2).'%';?></h5>
                    </div>
                  </footer>
              </div> <!--  /darkblue panel -->               
            </div><!-- col-md-4 col-sm-4 mb Panel redondo-->
                          
        </div><!-- row mt-->

        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->