<?php 
   
    settype($sec,"integer");
    $dni = intval($_POST['dni']); 
    echo "<br>".$dni;
    $pri = (isset($_REQUEST['discapacidad'])); 
    echo "<br>".$pri;

    if ($pri) {
        $dis="True";
        echo "<br>".$dis;
    }
?>

<div class="container-fluid">
<!-- ---------------    FILA 1    -------------------------->
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="idOperacion" value=1>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">COMPRAR</button>

         </form>
       </p>
    </div><!--col lg 3 -->
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="idOperacion" value=2>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">VENDER</button>

         </form>
       </p>
    </div><!--col lg 3 -->
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=1>
          <input type="hidden" name="idOperacion" value=3>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">TASAR</button>

         </form>
       </p>
    </div><!--col lg 3 -->
  </div><!-- row -->
<!-- ---------------    FIN FILA 1    -------------------------->

<!-- ---------------    FILA 2    -------------------------->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=3>
          <input type="hidden" name="idOperacion" value=1>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">PAGAR ALQUILER</button>

         </form>
       </p>
    </div><!--col lg 3 -->
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=3>
          <input type="hidden" name="idOperacion" value=2>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">COBRAR ALQUILER</button>

         </form>
       </p>
    </div><!--col lg 3 -->
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
      <p>
        <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="idSector" value=<?php echo $sec; ?>>
          <input type="hidden" name="dni" value=<?php echo $dni; ?>>
          <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>

          <button type="submit" name="idOperacion" value=1 type="button" class="btn btn-primary btn-lg btn-block">NADA</button>

         </form>
       </p>
    </div><!--col lg 3 -->
  </div><!-- row -->
<!-- ---------------    FIN FILA 2    -------------------------->

<!-- ---------------    FILA 3    -------------------------->

<div class="row">

    <div class="col-lg-1"></div>
        <div class="col-lg-11 text-center">
        
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    OPERACIONES RELACIONADAS CON ALQUILERES
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  OPERACIONES RELACIONADAS CON VENTAS
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            
          </div>



              
    </div>
</div>

<!-- ---------------    FIN FILA 3    -------------------------->

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


