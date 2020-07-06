
<!doctype html>
<html lang="en">
  <head>
<!-- Reload -->
  <script>
  (function(){
    setInterval(
      function(){
        document.location.reload()
      },
    40000)
  })()
</script>
<!-- Push notification -->
<script src="assets/push.js/bin/push.min.js"></script>
</head>



<body>
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
                   
                    <th>Operación</th>
                    <th>Turno</th>
                    <th>Comentario Turno</th>
                    <th>DNI Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Comentario Cliente</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $count_turno = 0;
                  foreach($listadeturnos as $listarTurnos):
                     
                ?>
                  <tr>
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
                    <td><?=$listarTurnos->comentarioTurno?></td>
                    <td><?=$listarTurnos->dniCliente?></td>                    
                    <td><?=$listarTurnos->nombreCliente?></td>
                    <td><?=$listarTurnos->apellidoCliente?></td>
                    <td><?=$listarTurnos->comentarioCliente?></td>
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

        
        <!-- Push notification -->
        <?php 
        if($count_turno >0){
          $tmp_noti = "
              <script>
                Push.create('Tienes turnos para atender!', {
                body: 'Cantidad de turnos en espera: $count_turno ',
                icon: 'assets/img/c.jpg',
                timeout: 19000,
                onClick: function () {
                window.focus();
                this.close();
              }
              });
              </script>";                

        echo $tmp_noti;
      }
        ?>

      </body>
</html>