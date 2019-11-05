<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='refresh' content="10">
    <title>index 1</title>
</head>
<body>



    <!-- LLAMADO -->
    <?php  $turnoLlamado = $this->modelo->MostrarUltimoLlamado();
        if($turnoLlamado){ 
          ob_start();
          header("refresh: 9; url = ?c=turnos&a=Llamados");          
          
        
        ob_end_flush(); 
         
        } 
    
    ?>


<div class="col align-self-center">


    <table class="table">
      <thead class="thead-light">
     
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
</body>
</html>