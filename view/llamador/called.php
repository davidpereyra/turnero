<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='refresh' content="2">
    <title>Llamados</title>
</head>
<body>



    <!-- LLAMADO -->
    <?php  $turnoLlamado = $this->modelo->MostrarUltimoLlamado();
        if($turnoLlamado){ 
          header("location:../newserver/?c=turnos&a=Llamar"); 
        }
    ?>
    <!-- FIN LLAMADO -->


<div class="col-lg-6">



<div class="llamadorTabla">
    <!-- LISTA DE TURNOS RECIENTEMENTE LLAMADOS -->
    <table class="table text-center ">
      <thead class="table-primary bg-danger table-dark">
     
        <tr>

          <th scope="col"><p class="letraTabla">TURNO</p></th>
          <th scope="col"><p class="letraTabla">BOX</p></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $lastCall = true;
          foreach($this->modelo->ListarTurnosLlamados() as $listarTurnos):
            if($lastCall == true){ 
              ?>
              <tr class="table-secondary">
                
            <?php
               $lastCall=false;
              }else{
                
            ?>
        
        <tr>
          <?php } ?>
          <th scope="row"><p class="letraTabla"><?= $listarTurnos->nomenclaturaSector . $listarTurnos->nomenclaturaOperacion ." ". $listarTurnos->nombreTurno; ?></p></td>
          <th><p class="letraTabla"><?=$listarTurnos->box;?></p></td>          
        </tr>
        <?php 
          
          endforeach;
        ?>
      </tbody>
    </table>
<!-- FIN LISTA DE TURNOS RECIENTEMENTE LLAMADOS -->
</div>
<!-- </body>
</html> -->


</div><!-- falta un div para cerrar <div class="container">   Para que quede centrado-->
