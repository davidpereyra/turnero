
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


    
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-9 main-chart">      
       <!-- TABLA PARA MOSTRAR EL TURNO PREVIO -->
      
            <div class="content-panel">
              <h5><i class="fa fa-angle-right"></i> DATOS DE TURNO A TRANSFERIR</h5>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Operación previa</th>
                    <th>Turno</th>
                    <th>DNI Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Comentario Cliente</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td><?=$actual->nombreOperacion?></td>
                    <td><?=$actual->nomenclaturaSector . $actual->nomenclaturaOperacion ." ". $actual->nombreTurno ?></td>
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
        <div class="border-head">
          <h3>Derivar turno por operación</h3>
        </div>
        <form class="form-inline" action="?c=usuario&a=DerivarPorOperacion" method="post">
          <textarea class="form-control" name="comentarioTurno" rows="2" cols="120" placeholder="Ingrese comentarios del turno para informar al siguiente operario." ></textarea>
          <br><br><br><br> 
          <select required name="selectOperacion" class=" form-control form-control-lg col-lg-12">
                <?php foreach($opUserOnline as $op): ?>
                  <option value="<?= $op->idOperacion?>" selected><?=$op->nombreOperacion?></option>
                <?php endforeach; ?> 
          </select>
          <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
          <input type="hidden" name="idTurnoActual" value=<?php print $actual->idTurno; ?>>
          <input type="hidden" name="idTurno">  
          <input type="hidden" name="dniCliente" value=<?php print $actual->dniCliente;?>>
          
          <p>(*) Sólo figuraran en esta lista las operaciones que puedan realizar las personas que se encuentren utilizando el sistema en este momento.</p>          
          <br><br>
          <button type="submit" class="btn btn-primary btn-lg btn-block ">Confirmar</button>
        </form><br><br><br>    

        <!--   FIN FORMULARIO 1 -- >
        <div class="border-head">
          <h3>Derivar a persona específica</h3>
        </div>
        <form>
        <select required name="" class="form-control form-control-lg">
                                
          <?php foreach($usersOnline as $u): ?>
                                
            <option value="<?= $u->nombreReal?>" selected><?=$u->nombreReal ." ". $u->apellidoReal; ?></option>
                                
          <?php endforeach; ?> 

        </select>
        
        <!-- FIN SELECT-- >
        <p>(*) Sólo figuraran en esta lista las personas que se encuentren utilizando el sistema en este momento.</p>
      --> </div><!-- /row  -->


      </body>
</html>