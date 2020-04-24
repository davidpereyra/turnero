
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
<section id="main-content">
  <section class="wrapper my-5">
    <div class="row">
      <div class="col-lg-9 main-chart">      
        <div class="border-head">
        <h4><i class="fa fa-angle-right"></i> DATOS DEL TURNO Y DEL CLIENTE</h4><hr>
        </div>

       <!-- TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
             
              <table class="table table-compact table-striped table-hover">
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
                  <tr>
                    <td><?php print $siguiente->idTurno; ?></td>
                    <td>
                      <?php                       
                        if($siguiente->idTurnoAnterior){
                          echo $siguiente->nombreOperacion . " (Derivado)";
                        }
                        else if($siguiente->priDiscapacidad){
                          echo $siguiente->nombreOperacion . " (Discapacidad)";
                        }else{
                          echo $siguiente->nombreOperacion;
                      }?>
                    </td>
                    <td><?=$siguiente->nomenclaturaSector . $siguiente->nomenclaturaOperacion ." ". $siguiente->nombreTurno ?></td>
                    <td><?php print $siguiente->comentarioTurno; ?></td>
                    <td><?php print $siguiente->dniCliente; ?></td>
                    <td><?php print $siguiente->nombreCliente; ?></td>
                    <td><?php print $siguiente->apellidoCliente; ?></td>
                    <td><?php print $siguiente->comentarioCliente; ?></td>
                  </tr>                 
                </tbody>
              </table>
            </div>   
          </div>   
        </div>       
        <!-- FIN TABLA PARA MOSTRAR EL SIGUIENTE TURNO -->
        <!-- INICIO TABLA CENTRAL DE TURNOS RESTANTES -->
       
       
       
        <!-- FIN TABLA CENTRAL  -->   
      </div><!-- /row  -->


      <!-- OJO QUE TERMINA EN EL SIGUIENTE ARCHIVO (sidebarderecho) Y FINALIZAN LOS DIVS -->   
