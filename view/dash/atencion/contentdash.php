
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


<!-- close notification -- >
<script>
   var reallys = false;
   var allows = true;
   window.onbeforeunload = function(){
	   if(allows){
		   if(!reallys && true){
			   reallys = true;
			   var msg = "seguro?";
			   return msg;
		   }
	   }else{
		   allows = true;
	   }
   }
</script>-->

</head>



<body>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
<section id="main-content">
  <section class="wrapper my-5">
    <div class="row">
      <div class="col-lg-9 main-chart">      
        <div class="border-head">
          <h3>INFORMACIÓN SOBRE TURNOS EN ESPERA</h3>
        </div>
        <!-- TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->
        <table class="table table-compact table-striped table-hover " id="turnos_id">
	  	          <thead class="thead-dark">
               
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Operación</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Comentario Turno</th>
                    <th scope="col">DNI Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Comentario Cliente</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                $count_turno = 0;
                  foreach($listadeturnos as $listarTurnos):
                     
                ?>
                  <tr>
                    <td><?=$listarTurnos->idTurno?></td>
                    <td>
                      <?php 
                        $count_turno++;
                        if($listarTurnos->idTurnoAnterior){
                          echo $listarTurnos->nombreOperacion . " (Derivado)";
                        }
                        else if($listarTurnos->priDiscapacidad){
                          echo $listarTurnos->nombreOperacion . " (Discapacidad)";
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
       <!--FIN TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->       
        
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