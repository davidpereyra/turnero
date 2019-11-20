<script>
  (function(){
    setInterval(
      function(){
        document.location.reload()
      },
    10000)
  })()
</script>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-9 main-chart">      
        <div class="border-head">
          <h3>INFORMACIÓN SOBRE TURNOS</h3>
        </div>

       <!-- TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> DATOS DEL TURNOS EN ESPERA</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Operación</th>
                    <th>Turno</th>
                    <th>DNI Cliente</th>
                    <th>Comentario</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($listadeturnos as $listarTurnos):
                ?>
                  <tr>
                    <td><?=$listarTurnos->idTurno?></td>
                    <td><?=$listarTurnos->nombreOperacion?></td>
                    <td><?=$listarTurnos->nomenclaturaSector . $listarTurnos->nomenclaturaOperacion ." ". $listarTurnos->nombreTurno ?></td>
                    <td><?=$listarTurnos->dniCliente?></td>
                    <td><?=$listarTurnos->comentarioTurno?></td>
                  </tr>  
                  <?php 
                   endforeach;
                  ?>                 
                </tbody>
              </table>
            </div>   
          </div>   
        </div>       
        <!-- FIN TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->
        
      </div><!-- /row  -->


      <!-- OJO QUE TERMINA EN EL SIGUIENTE ARCHIVO (sidebarderecho) Y FINALIZAN LOS DIVS -->   
