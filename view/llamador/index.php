<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index 1</title>
</head>
<body>
    <?php ?>

    <table class="striped">
        <thead>
          <tr>
              <th>ID Turno</th>
              <th>Nombre Turno</th>
              <th>ID Sector</th>
              <th>Prioridad</th>
              <th>Comentario</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php 
            foreach($this->modelo->ListarTurnosCreados() as $listarTurnos):
          ?>
          <tr>
            <td><?=$listarTurnos->idTurno?></td>
            <td>Proximamente...</td>
            <td><?=$listarTurnos->idSector?></td>
            
            <td><?=$listarTurnos->prioridad?></td>
            <td><?=$listarTurnos->comentario?></td>
            <td>Editar | Eliminar</td>
          </tr>
          <?php 
            endforeach;
          ?>
        </tbody>
    </table>




</body>
</html>