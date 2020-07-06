
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
<section id="main-content">
  <section class="wrapper my-5">
    <div class="row">
      <div class="col-lg-9 main-chart">      
        <div class="border-head">
        <h4><i class="fa fa-angle-right"></i> DATOS DEL TURNO Y DEL CLIENTE</h4>
              <hr>
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
                        } else if($siguiente->priDiscapacidad){
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
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> DATOS DEL CLIENTE</h4> <hr>
            
              <form action="?c=Usuario&a=ActualizarDatosCliente" class="form-horizontal style-form" method="POST">
              
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Identidad</label>
                  <div class="col-sm-10">                    
                    <input type="hidden" class="form-control" name="idTurno" value="<?php print $siguiente->idTurno; ?>"> <br>
                    <input type="text" class="form-control" name="razonSocialCliente" placeholder="Razon Social de Cliente si es empresa" value="<?php print $siguiente->razonSocialCliente; ?>"> <br>
                    <input type="number" data-length="15"  min="1000000" max="99999999999999" maxlength="15" class="form-control" name="cuitCliente" placeholder="CUIT del Cliente" value="<?php print $siguiente->cuitCliente; ?>"> <br>
                    <input type="text" class="form-control" name="nombreCliente" placeholder="Nombre/s" value="<?php print $siguiente->nombreCliente; ?>"> <br>
                    <input type="text" class="form-control" name="apellidoCliente" placeholder="Apellido/s" value="<?php print $siguiente->apellidoCliente; ?>"> <br>
                    <input type="number" data-length="15"  min="1000000" max="99999999999999" maxlength="10" class="form-control" name="dniCliente" placeholder="DNI" value="<?php print $siguiente->dniCliente; ?>"><br>
                    <input type="number" data-length="15"  min="1000000" max="99999999999999" maxlength="15" class="form-control" name="cuilCliente" placeholder="CUIT del Cliente sin guiones (-)" value="<?php print $siguiente->cuilCliente; ?>"> <br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Contacto</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mailCliente" placeholder="Enter email" value="<?php print $siguiente->mailCliente; ?>">   <br>                 
                  </div>
                  <div class="col-sm-10">
                    <input type="number" data-length="20"  min="1000000" max="99999999999999" maxlength="20" class="form-control" name="telefono1Cliente" placeholder="Telefono 1" value="<?php print $siguiente->telefono1Cliente; ?>">  <br>                                 
                  </div>
                  <div class="col-sm-10">
                    <input type="number" data-length="20"  min="1000000" max="99999999999999" maxlength="20"  class="form-control" name="telefono2Cliente" placeholder="Telefono 2" value="<?php print $siguiente->telefono2Cliente; ?>">   <br>           
                  </div>

                  <div class="col-sm-10">
                    <label for="exampleFormControlTextarea1">Comentarios adicionales</label>
                    <textarea class="form-control" name="comentarioCliente" rows="3"><?php print $siguiente->comentarioCliente; ?></textarea>
                  </div>

                </div>


                



                <div class="form-group">                  
                  <div class="col-sm-10">
                    <button class="btn btn-primary btn-lg btn-block btnFuncion" type="submit">
                        ACTUALIZAR DATOS DEL CLIENTE
                    </button>
                  </div>
                </div>                

              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
       
       
        <!-- FIN TABLA CENTRAL  -->   
      </div><!-- /row  -->


      <!-- OJO QUE TERMINA EN EL SIGUIENTE ARCHIVO (sidebarderecho) Y FINALIZAN LOS DIVS -->   
