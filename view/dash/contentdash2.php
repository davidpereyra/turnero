
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
              <h4><i class="fa fa-angle-right"></i> DATOS DEL TURNO Y DEL CLIENTE</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Operación</th>
                    <th>Turno</th>
                    <th>Comentario Turno</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Comentario Cliente</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  
                    <td><?php print $siguiente->nombreOperacion; ?></td>
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
