<?php


$conectar=new mysqli("localhost", "root", "", "turnos");

/*verificar conexion */
if ($conectar->connect_errno) {
    printf("Error al conectar: %s\n", $conectar->connect_error);
    exit();
}

date_default_timezone_set('America/Argentina/Mendoza');
                $fecha = date('Y-m-d H:i:s');

/*insertar registro */

$conectar->query("UPDATE `usuario` SET `usuario`.`online`= 0,`usuario`.`nroPuesto`= NULL;");


?>