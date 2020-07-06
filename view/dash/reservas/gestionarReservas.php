
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


    
<section id="main-content">
  <section class="wrapper my-5 site-min-height">
    <div class="row">
      <div class="col-lg-9 main-chart">     
      <div class="border-head">
        <h3><i class="fa fa-angle-right"></i> GESTIÓN DE RESERVAS</td></h3>
      </div> 
      <!-- Mensaje -->
      <?php

        if (!empty($msg)) {
      ?>
        <div class="alert alert-success" role="alert">
          <button class="close" data-dismiss="alert">
            <span>
              &times;
            </span>
          </button>
          <strong>
            <?php
              echo $msg;
              $msg='';
            ?>
          </strong>          
        </div>
      <?php
        }      
      ?>
      <!-- Fin Mensaje -->      
        <!-- TABLA PARA MOSTRAR HISTORICO TURNO -->
        <table class="table table-compact table-striped table-hover " id="turnos_id">
	  	          <thead class="thead-dark">               
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Operacion</th>
                    <th scope="col">Cita</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Realizado</th>
                    <th scope="col">Gestión</th>
                  </tr>
                </thead>
                <tbody>
                <?php                                
                  foreach($datosReserva as $res):                     
                ?>
                  <tr>
                    <td><?=$res->idReserva;?></td>
                    <td><?=$res->nombreOperacion;?></td>
                    <td><?=$res->fechaReserva.' '.$res->horaReserva;?></td>
                    <td><?=$res->nombreCliente.' ' . $res->apellidoCliente;?></td>
                    <td><?=$res->dniCliente;?></td>
                    <td><?=$res->telefono1Cliente.'<br>'.$res->mailCliente;?></td>
                    <td><?=$res->comentarioReserva;?></td>
                    <td><?=$res->fechaAltaReserva.'<br>'.$res->horaAltaReserva;?></td>
                    <td>    
                        <div class="btn-group">
                            <form name="form" action="?c=usuario&a=ConfirmarReservaTurno" method="post">
                                <input type="hidden" name="idReserva" value=<?php print $res->idReserva; ?>>
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>&nbsp;
                            <form name="form" action="#" method="post">
                                <input type="hidden" name="idReserva" value=<?php print $res->idReserva; ?>>
                                <button class="btn btn-info disabled" type="submit">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </form>&nbsp;                            
                            <form name="form" action="?c=usuario&a=InicioDash" method="post">
                                <input type="hidden" name="idReserva" value=<?php print $res->idReserva; ?>>
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-times-circle"></i>
                                </button>    
                            </form>   
                                                
                        </div>
                    </td>
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