
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
                    <th>#</th>
                    <th>Numero Turno</th>
                    <th>DNI Cliente</th>
                    <th>Nombre Cliente</th>
                    <th>Apellido Cliente</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php print $siguiente->idTurno; ?></td>
                    <td><?php print $siguiente->nombreTurno; ?></td>
                    <td><?php print $siguiente->dniCliente; ?></td>
                    <td><?php print $siguiente->nombreCliente; ?></td>
                    <td><?php print $siguiente->apellidoCliente; ?></td>
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
