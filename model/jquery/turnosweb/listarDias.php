<?php 

$nombreOperacion=$_POST['nombreOperacion'];

date_default_timezone_set('America/Argentina/Mendoza');
$fecha = date('d-m-Y');
$cadena="<select id='fecha' name='fecha' class='form-control'>";
$cadena=$cadena.'<option value='.'disabled selected>Seleccione un dia....</option>';

	
	for ($i=0; $i < 5; $i++) { 
		$dias = $i;
		$datestart= strtotime($fecha);
		$datesuma = 15 * 86400;
		$diasemana = date('N',$datestart);
		$totaldias = $diasemana+$dias;
		$findesemana = intval( $totaldias/5) *2 ; 
		$diasabado = $totaldias % 5 ; 
		if ($diasabado==6) $findesemana++;
		if ($diasabado==0) $findesemana=$findesemana-2;
		$total = (($dias+$findesemana) * 86400)+$datestart ; 
		$twstart=date('d-m-Y', $total);
		if ($twstart=='25-05-2020' || $twstart=='09-07-2020'|| $twstart=='10-07-2020') {
			$twstart='';
		}else{
			$cadena=$cadena.'<option value='.$twstart.'>'.utf8_encode($twstart).' - '.get_nombre_dia($twstart).'</option>';
		}
	}		

echo  $cadena."</select>";
//----
function get_nombre_dia($fecha){
	$fechats = strtotime($fecha); //pasamos a timestamp
 
 //el parametro w en la funcion date indica que queremos el dia de la semana
 //lo devuelve en numero 0 domingo, 1 lunes,....
	switch (date('w', $fechats)){
		case 0: return "Domingo"; break;
		case 1: return "Lunes"; break;
		case 2: return "Martes"; break;
		case 3: return "Miercoles"; break;
		case 4: return "Jueves"; break;
		case 5: return "Viernes"; break;
		case 6: return "Sabado"; break;
	}
 }

?>