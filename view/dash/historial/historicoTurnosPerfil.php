<body>
  <section id="container">
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
<section id="main-content">
  <section class="wrapper my-5 site-min-height">
    <div class="row">
      <div class="col-lg-9 main-chart">      
      <div class="border-head">
        <h3><i class="fa fa-angle-right"></i> HISTORIAL DE TURNOS DE PERFIL</td></h3>
      </div> 
        <!-- TABLA PARA MOSTRAR HISTORICO TURNO -->
        <table class="table table-compact table-striped table-hover " id="turnos_id">
	  	          <thead class="thead-dark">
               
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Operación</th>
                    <th scope="col">Turno</th>
                    <th scope="col">#</th>
                    <th scope="col">Estado Turno</th>
                    <th scope="col">&nbspDesde&nbsp&nbsp</th>
                    <th scope="col">&nbsp&nbspHasta&nbsp&nbsp</th>
                    <th scope="col">DNI Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Atendido</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                $count_turno = 0;
                  foreach($historicoVer as $listarTurnos):
                     
                ?>
                  <tr>
                    <td><?=$listarTurnos->idTurno?></td>
                    <td>
                      <?php 
                        $count_turno++;
                        if($listarTurnos->priDiscapacidad == 1){
                          echo $listarTurnos->nombreOperacion . " (Derivado)";
                        }else{
                          echo $listarTurnos->nombreOperacion;
                      }?>
                    </td>

                    
                    <td><?=$listarTurnos->nomenclaturaSector . $listarTurnos->nomenclaturaOperacion ." ". $listarTurnos->nombreTurno ?></td>
                    <td><?=$listarTurnos->idEstadoTurno?></td>
                    <td><span class="badge badge-secondary" style="font-size:13px"><?=$listarTurnos->nombreEstadoTurno?></span></td>
                    <td><?=$listarTurnos->fechaAlta?></td>
                    <td><?=$listarTurnos->fechaBaja?></td>
                    <td><?=$listarTurnos->dniCliente?></td>                    
                    <td><?=$listarTurnos->nombreCliente?></td>
                    <td><?=$listarTurnos->apellidoCliente?></td>
                    <td><?=$listarTurnos->nombreUsuario?></td>
                  </tr>  
         
                  <?php  
                   endforeach;
                  ?>                 
                </tbody>
              </table>
       <!--FIN TABLA PARA MOSTRAR HISTORICO TURNO -->     


       </div><!-- /row  -->


      </body>
</html>