<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='refresh' content="5">
    <title>index 1</title>
</head>
<body>
    <?php ?>

    <table class="table">
  <thead class="thead-light">
     
    <tr>

      <th scope="col"><h1>TURNO</h1></th>
      <th scope="col"><h1>BOX</h1></th>
    </tr>
  </thead>
  <tbody>
    <?php 
            foreach($this->modelo->ListarTurnosLlamados() as $listarTurnos):
          ?>
    <tr>
      
      <th scope="row"><h1><?= $listarTurnos->nomenclaturaSector . $listarTurnos->nomenclaturaOperacion ." ". $listarTurnos->nombreTurno; ?></h1></td>
      <td><h1><?=$listarTurnos->box;?></h1></td>
      
    </tr>
    <?php 
            endforeach;
          ?>
  </tbody>
</table>



</body>
</html>