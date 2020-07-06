
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


    
<section id="main-content">
  <section class="wrapper my-5">
    <div class="row">
      <div class="col-lg-9 main-chart">      
       <!-- TABLA PARA MOSTRAR EL TURNO PREVIO -->
      
            <div class="content-panel">
              <h5><i class="fa fa-angle-right"></i> DATOS DE TURNO A TRANSFERIR</h5>
              <hr>
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
                    <td><?=$actual->idTurno?></td>
                    <td>
                      <?php                       
                        if($actual->idTurnoAnterior){
                          echo $actual->nombreOperacion . " (Derivado)";
                        } else if($actual->priDiscapacidad){
                          echo $actual->nombreOperacion . " (Discapacidad)";
                        }else{
                          echo $actual->nombreOperacion;
                      }?>
                    </td>
                    <td><?=$actual->nomenclaturaSector . $actual->nomenclaturaOperacion ." ". $actual->nombreTurno?></td>
                    <td><?=$actual->comentarioTurno ?></td>
                    <td><?=$actual->dniCliente?></td>                    
                    <td><?=$actual->nombreCliente?></td>
                    <td><?=$actual->apellidoCliente?></td>
                    <td><?=$actual->comentarioCliente?></td>
                  </tr>  
                              
                </tbody>
              </table>
            </div>   
         <br> 
        <!-- FIN TABLA PARA MOSTRAR EL TURNO PREVIO -->      

        <!-- DERIVAR POR OPERACION -->   
        <hr>
        <div class="border-head">
        <h3><i class="fa fa-angle-right"></i> DERIVAR TURNO POR OPERACIÓN</h3>
        </div>
        <form  action="?c=Usuario&a=DerivarPorOperacion" method="post">
          <textarea class="form-control" name="comentarioTurno" rows="2" cols="120" placeholder="Ingrese comentarios del turno para informar al siguiente operario." ></textarea>
          <br>
          <select required name="selectOperacion" class=" form-control form-control-lg col-lg-12">
                <?php foreach($opUserOnline as $op): ?>
                  <option value="<?php
                      if($op->idOperacion  != 17){
                        echo $op->idOperacion;}
                    ?>" selected>
                    <?php
                      if($op->nombreOperacion  != 'Atencion Personalizada'){
                        echo $op->nombreOperacion;}
                    ?>
                  </option>
                <?php endforeach; ?> 
          </select>
          <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
          <input type="hidden" name="idTurnoActual" value=<?php print $actual->idTurno; ?>>
          <input type="hidden" name="idTurno">  
          <input type="hidden" name="dniCliente" value=<?php print $actual->dniCliente;?>>
          
          <p>(*) Sólo figuraran en esta lista las operaciones que puedan realizar las personas que se encuentren utilizando el sistema en este momento.</p>          
          
          <button type="submit" class="btn btn-primary btn-lg btn-block ">Confirmar</button>
        </form><br><br><br> <!-- FIN DERIVAR POR OPERACION -->       
        <hr>
        <!-- DERIVAR POR USUARIO -->   
        <div class="border-head">
          <h3><i class="fa fa-angle-right"></i> DERIVAR TURNO A PERSONA ESPECÍFICA</h3>
        </div>
        
        <form  action="?c=Usuario&a=DerivarPorUsuario" method="post">
        
          <textarea class="form-control" name="comentarioTurno" rows="2" cols="120" placeholder="Ingrese comentarios del turno para informar al siguiente operario." ></textarea>
          <br>

          <select required name="idUsuarioSeleccionado" class="form-control form-control-lg">
            <?php foreach($usersOnline as $u): ?>
              <option value="<?= $u->idUsuario?>" selected><?=$u->idUsuario ." - ".$u->nombreReal ." ". $u->apellidoReal; ?></option>
            <?php endforeach; ?> 
          </select>

          <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
          <input type="hidden" name="idTurnoActual" value=<?php print $actual->idTurno; ?>>
          <input type="hidden" name="idTurno">  
          <input type="hidden" name="dniCliente" value=<?php print $actual->dniCliente;?>>
          <p>(*) Sólo figuraran en esta lista las personas que se encuentren utilizando el sistema en este momento.</p>
          
          <button type="submit" class="btn btn-primary btn-lg btn-block ">Confirmar</button>
        
        </form>

      <!-- FIN DERIVAR POR USUARIO -->   

       </div><!-- /row  -->


      </body>
</html>