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
  
<!-- ---------------    FILA 3    -------------------------->

                   <div class="row">
                   
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


<!-- PARA DIV CARDS                 
<div class="row"> <div class="col-lg-4">
<div class="card bg-dark text-white">
  <a href="#">
  <img src="assets/img/test1.jpg" class="card-img img-fluid" alt="...">
  </a>
</div>
</div></div>-->



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