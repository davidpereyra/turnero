<?php 
   
    settype($sec,"integer");
    $dni = intval($_POST['dni']); 
    //echo "<br>".$dni;
    $pri = (isset($_REQUEST['discapacidad'])); 
    //echo "<br>".$pri;

    if ($pri) {
        $dis="True";
        //echo "<br>".$dis;
    }
?>
<div class="row ">
  <div class=" col-12 text-center ">
    </br><h3>Por favor <span class="ingreseDni">SELECCIONE OPERACIÓN:</span></h3></br>
  </div>
</div>  
<div class="container-fluid recuadroTecla">

<!-- ---------------    FILA 1    -------------------------->
  <div class="row">
   
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block botonOp">COMPRAR</button>

         </form>
       </p>
    </div><!--col lg 4 -->
    
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=2 type="button" class="btn btn-primary btn-lg btn-block botonOp">VENDER</button>

         </form>
       </p>
    </div><!--col lg 4 -->
    
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=3 type="button" class="btn btn-primary btn-lg btn-block botonOp">TASAR</button>

         </form>
       </p>
    </div><!--col lg 4 -->
  </div><!-- row -->
<!-- ---------------    FIN FILA 1    -------------------------->

<!-- ---------------    FILA 2    -------------------------->
<div class="row">
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=2>          
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>
          <button type="submit" name="idOperacion" value=11 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_alq">BUSCAR ALQUILER</button>
          

         </form>
       </p>
    </div><!--col lg 4 -->
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=2>          
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=10 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_alq">OFRECER ALQUILER</button>

         </form>
       </p>
    </div><!--col lg 4 -->
    <div class="col-lg-4">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=2>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=5 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_alq">RENOVAR ALQUILER</button>

         </form>
       </p>
    </div><!--col lg 4 -->
  </div><!-- row -->
<!-- ---------------    FIN FILA 2    -------------------------->

<!-- ---------------    FILA 3    -------------------------->

                   <div class="row">
                   <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=2>
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=9 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_alq">PRESENTAR DOCUMENTACIÓN</button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                   <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=3>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=12 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_caja">PAGAR ALQUILER</button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                    <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=3>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=13 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_caja">COBRAR ALQUILER</button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->

                  </div><!-- row -->
                  <!-- FIN FILA 3-->

                   <!-- INICIO FILA 4-->
                  <div class="row">
                  <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=2>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>
                          <button type="submit" name="idOperacion" value=4 type="button" class="btn btn-primary btn-lg btn-block botonOp">CONTRATOS</button>  
                          

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                    <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=3>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=6 type="button" class="btn btn-primary btn-lg btn-block botonOp">RESCICIONES</button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                    <div class="col-lg-4">
                      <p>
                      <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=2>
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>
                          <button type="submit" name="idOperacion" value=7 type="button" class="btn btn-primary btn-lg btn-block botonOp">RECLAMOS</button>
                          

                        </form>                       
                      </p>
                    </div><!--col lg 4 -->
                  </div><!-- row -->
                  <!-- FIN FILA 4-->

                  <!-- INICIO FILA 5-->
                  <div class="row">
                  <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=2>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>
                          <button type="submit" name="idOperacion" value=8 type="button" class="btn btn-primary btn-lg btn-block botonOp">REINTEGRO DE SERVICIOS</button>  
                          

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                    <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=4>          
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=14 type="button" class="btn btn-primary btn-lg btn-block botonOp">PROVEEDORES - RRHH</button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                    <div class="col-lg-4">
                      <p>
                        <form action="?c=inicio&a=selectTurno" name="seleccionSector" method="POST">
                          <input type="hidden" name="idTurno">
                          <input type="hidden" name="idSector" value=0>
                          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

                          <button type="submit" name="idOperacion" value=0 type="button" class="btn btn-primary btn-lg btn-block botonOp btn_back"><strong>VOLVER</strong></button>

                        </form>
                      </p>
                    </div><!--col lg 4 -->
                  </div><!-- row -->
                  <!-- FIN FILA 5-->


</div><!-- container fluid -->

            




<!--
  <a href="#collapseExample" class="btn btn-primary" data-toggle="collapse">
    Link with href
  </a>

<div class="collapse" id="collapseExample">
  <div class="well">
    <p><form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                                <input type="hidden" name="idTurno">
                                <input type="hidden" name="idSector" value=<?php echo $sec; ?>>
                                <input type="hidden" name="dni" value=<?php echo $dni; ?>>
                                <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>- ->

                                <button class="btn waves-effect waves-light" type="submit" name="idOperacion" value=1>NOMBRE OPERACION 1
                                
                                </button>
                            </form></p>
  </div>
</div
-->



</div>  <!-- Cierre <div class="py-5 bg-light">-->