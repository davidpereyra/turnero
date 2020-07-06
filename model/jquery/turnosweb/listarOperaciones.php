<?php 
require_once '../../dataconec.php';

$conexion=mysqli_connect($servidor,$usuariobd,$pass,$nombrebd );
$nombreSector=$_POST['nombreSector'];

	$sql="SELECT * FROM `operacion`
		INNER JOIN  `sector` ON `operacion`.`idSector` = `sector`.`idSector`
		WHERE `sector`.`nombreSector` = '$nombreSector'
		AND `operacion`.`accionTurnoWeb` IS TRUE";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select id='operacion' name='operacion' class='form-control'>";
	$cadena=$cadena.'<option value='.'disabled selected>Seleccione una operacion</option>';
	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[2].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";

?>