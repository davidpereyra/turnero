<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='refresh' content="8">
    <title>Llamar Siguiente</title>
    
</head>
<body>
<audio  autoplay="true">
    
    <source src="assets\audio\audio1.ogg">
    
	</audio>
    <!-- LLAMADO -->
    <?php  $turnoLlamado = $this->modelo->MostrarUltimoLlamado();
        if($turnoLlamado){ 
          ob_start();
          header("refresh: 5; url =?c=turnos&a=Llamados");          
          
        
        ob_end_flush(); 
         
        } 
    
    ?>

<div class="col-lg-6">
<div class="llamadorTabla">
<div class="col align-self-center">


    <table class="table text-center">
      <thead class="table-primary bg-danger table-dark">
     
        <tr>

          <th scope="col"><h1>TURNO</h1></th>
          <th scope="col"><h1>BOX</h1></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          
          <th scope="row"><h1><?php if($turnoLlamado){ echo $turnoLlamado->nomenclaturaSector . $turnoLlamado->nomenclaturaOperacion  ." ". $turnoLlamado->nombreTurno . "<br>";}?></h1></td>
          <td><h1><?php if($turnoLlamado){ echo $turnoLlamado->box ."<br>" ;} ?></h1></td>          
        </tr>
        
      </tbody>
    </table>
<!-- FIN LLAMADO -->

<?php
  $this->modelo->DejarDeLlamar($turnoLlamado->idTurno);
?>

</div>
</div>
<!-- </body>
</html> --></div>