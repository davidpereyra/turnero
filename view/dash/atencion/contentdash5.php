
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
              <h5><i class="fa fa-angle-right"></i> DATOS DE TURNO TRANSFERIDO</h5>
              <hr>
              <table class="table table-compact table-striped table-hover">
	  	          <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nueva Operación</th>
                    <th scope="col">Turno</th>
                    <th scope="col">DNI Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Comentario informativo del turno</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td><?=$imprimir->idTurno?></td>
                    <td>
                      <?php                       
                        if($imprimir->idTurnoAnterior){
                          echo $imprimir->nombreOperacion . " (Derivado)";
                        } else if($actual->priDiscapacidad){
                          echo $actual->nombreOperacion . " (Discapacidad)";
                        }else{
                          echo $imprimir->nombreOperacion;
                      }?>
                    </td>
                    <td><strong><?=$imprimir->nomenclaturaSector . $imprimir->nomenclaturaOperacion ." ". $imprimir->nombreTurno ?></strong></td>
                    <td><?=$imprimir->dniCliente?></td>                    
                    <td><?=$imprimir->nombreCliente?></td>
                    <td><?=$imprimir->apellidoCliente?></td>
                    <td><?=$imprimir->comentarioTurno?></td>
                  </tr>  
                              
                </tbody>
              </table>
              <a href="?c=usuario&a=InicioDash">
              <button type="button" class="btn btn-primary btn-lg btn-block">Volver a inicio</button>
              </a>
            </div>   
         <br> 
        <!-- FIN TABLA PARA MOSTRAR EL TURNO PREVIO -->      
        </div><!-- /row  -->


      </body>
</html>