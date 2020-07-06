<!DOCTYPE html>
<html lang="es">  
<head>
<meta charset='utf-8'>

    <meta name='viewport' content='width=device-width initial-scale=1'>
    <meta name='mobile-web-app-capable' content='yes'>
    <link rel='stylesheet' href='assets/css/style.css'>
    <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/css/login.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    </head>
<body>
<header>
  
  <div class="navbar bg-dark shadow-sm"> <!--clases navbar-dark bg-dark shadow-sm-->
    <div class="container d-flex justify-content-between ">
   
      <img src="assets/img/isologo_cocucci.png"  width="" height="80px">
   
      <!--<a href="#" class="navbar-brand d-flex align-items-center">
        
        <strong>Cocucci</strong>
     -->
      <a href="https://najim.gen/turnero/?c=inicio&a=selectTurno"
      <button type="button" class="btn btn-outline-danger">VOLVER</button>
      </a>
     
    </div>
  </div>
</header>

<div class="container">
<?php
//echo $dniValidado;
?>
<div class="row ">
  <div class=" col-12 text-center ">
  </br><h3>Bienvenida/o <span class="ingreseDni">
      <?php 
       
        if($nombreCliente != NULL){
          echo $nombreCliente . " " . $apellidoCliente;
        }else{
          echo "a Cocucci inmobiliaria";
        }
      ?></span>. Por favor<span class="ingreseDni"> Indique si se indenfica con alguna de estas figura:</span> </h3></br>
  </div>
</div>  
<div class="container-fluid recuadroTecla">

<!-- ---------------    FILA 1    -------------------------->
  
<!-- ---------------    FILA 3    -------------------------->

  <div class="row">
    <img src="assets/img/img_movilidad_reducida.jpg" alt="discapacidad" class="imgDiscapacidad">
                    <?php                 
                       
                    ?><!--
                      <div class="col-lg-6">
                        <p>
                          <form action="?c=inicio&a=GenerarTurno" name="seleccionOperacion" method="POST">
                            <input type="hidden" name="idTurno">
                            <input type="hidden" name="dniValidado" value=<?php echo $dniValidado; ?>>
                            <input type="hidden" name="idSector" value=<?php echo $idSector; ?>>
                            <input type="hidden" name="discapacidad" value=<?php echo $pri;?>>
                            <button type="submit" name="idOperacion" value=<?=$op->idOperacion?> type="button" class="btn btn-primary btn-lg btn-block botonOp btn_caja"><?=$op->nombreOperacion?></button>
                          </form>
                        </p>
                      </div><!--col lg 6 -->

                    <?php ?>  


                                          
    </div><!-- row -->
    


  </div><!-- container fluid --> <br>


            

</div>  <!-- Cierre <div class="py-5 bg-light">-->


<div class="row">
  <div class="col-lg-2"></div>
      <div class="col-lg-4">
      <form action="?c=inicio&a=SeleccionarSector" name="selecPrioridad" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="dniValidado" value=<?php echo $dniValidado; ?>>
          <button type="submit" name="priDiscapacidad" value="1" type="button" class="btn btn-primary btn-lg btn-block">SI</button>
        </form>
        
      </div><!--col lg 6 -->
      <div class="col-lg-4">
        <form action="?c=inicio&a=SeleccionarSector" name="selecPrioridad" method="POST">
          <input type="hidden" name="idTurno">
          <input type="hidden" name="dniValidado" value=<?php echo $dniValidado; ?>>
          <button type="submit" name="priDiscapacidad" value="0" type="button" class="btn btn-primary btn-lg btn-block">NO</button>
        </form>
        
      </div><!--col lg 6 -->
      <div class="col-lg-2"></div>
    </div><!-- row -->
