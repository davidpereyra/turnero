<?php 


//Recepcion de variables
if ((!isset($_POST['operacion'])) ||(!isset($_POST['diaHabil']))){
    $operacion="Seleccione una operacion";
    $diaHabil="Seleccione un dia";    
}else{
    $operacion=$_POST['operacion'];
    $diaHabil=$_POST['diaHabil'];
    $diaHabil = date("Y-m-d", strtotime($diaHabil));
}
$rango = '00:25:00';
//Calculo de $var1 para RANGO 1
function round_time( $time, $round_to_minutes = 5, $type = 'auto' ) {//si 16:15 - redondea hacia arriba a los 5 minutos
    $round = array( 'auto' => 'round', 'up' => 'ceil', 'down' => 'floor' );
    $round = @$round[ $type ] ? $round[ $type ] : 'round';
    $seconds = $round_to_minutes * 60;
    if(substr_count($time,":")==2)
      return date( 'H:i:s', $round( strtotime( $time ) / $seconds ) * $seconds );
    else
      return date( 'H:i', $round( strtotime( $time ) / $seconds ) * $seconds );
}
   // echo "<br>".round_time("16:12",30, "up");
date_default_timezone_set('America/Argentina/Mendoza');
$today = date('Y-m-d');
$dateToday = date('H:i:s'); 

if ($diaHabil == $today) {
    $var1 = round_time("$dateToday",30, "up");
}else {
    $var1 = '09:00:00';
}


//Calculo RANGO 1

$var2 = '16:00:00';
$intervarlo = '30';
$fechaInicio1 = new DateTime($var1);
$fechaFin1 = new DateTime($var2);
$fechaFin1 = $fechaFin1->modify( '+30 minutes' ); 
$rangoFechas1 = new DatePeriod($fechaInicio1, new DateInterval('PT30M'), $fechaFin1);           
foreach($rangoFechas1 as $fecha){
    $listahora[] = $fecha->format("H:i:s") . PHP_EOL;               
}	
//Calculo  RANGO 2 - comentar si no corresponde
/*
$var3 = '16:00:00';
$var4 = '20:00:00';
$intervarlo = '30';
$fechaInicio2 = new DateTime($var3);
$fechaFin2 = new DateTime($var4);
$fechaFin2 = $fechaFin2->modify( '+30 minutes' ); 
$rangoFechas2 = new DatePeriod($fechaInicio2, new DateInterval('PT30M'), $fechaFin2);
           
foreach($rangoFechas2 as $fecha){
    $listahora[] = $fecha->format("H:i:s") . PHP_EOL;               
}*/
//inicio creacion de select 
$cadena="<select id='hora' name='hora' class='form-control'>"; 
$cadena=$cadena.'<option value='.'>Seleccione un horario</option>';
//CONEXION - TurnosPendientesEnIntervalo  en TURNOHISTORIAL 
$conexion=mysqli_connect('localhost','root','Sistemas2875','turnos');
        /* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}    
foreach ($listahora as $hora) {            
    //$fechaHora = $diaHabil.' '.$hora;    
    $sql="SELECT `reserva`.`idReserva` FROM `reserva`           
    INNER JOIN `reservahistorial` ON `reserva`.`idReserva`=`reservahistorial`.`idReserva`
    INNER JOIN `operacion` ON `reserva`.`idOperacion` = `operacion`.`idOperacion`
    WHERE `operacion`.`nombreOperacion`='$operacion' 
    AND `reserva`.`fechaReserva` = '$diaHabil'
    AND `reserva`.`horaReserva` <= ADDTIME ('$hora','$rango')
    AND `reserva`.`horaReserva` >= SUBTIME ('$hora','$rango')
    AND `reservahistorial`.`idEstadoReserva` = 1;
    ";

    $result=mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (empty($fila['idReserva'])) { 
        $hora = date("H:i", strtotime($hora));           
        $cadena=$cadena.'<option value='.$hora.'>'.$hora.'</option>';
    }

}
echo $cadena."</select>";
?>