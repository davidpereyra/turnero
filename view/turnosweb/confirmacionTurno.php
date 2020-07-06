<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Datos de reserva - Cocucci Inmobiliaria</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel='stylesheet' href='assets/css/raleway-font.css'>
	<link rel="stylesheet" type="text/css" href="assets/font/wizard/css/material-design-iconic-font.min.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
<?php
$fechaReserva = date("d-m-Y", strtotime($fechaReserva));
$horaReserva = date("H:i", strtotime($horaReserva));
$fechaAltaReserva = date("d-m-Y", strtotime($fechaAltaReserva));
$horaAltaReserva = date("H:i", strtotime($horaAltaReserva));

?>
</head>
<body>
	<div class="page-content" style="background-color: #ececec">
		<div class="wizard-v1-content" >
			<div class="wizard-form">
                <h3 class="text-center">Detalles del turno</h3>
                <div class="table-responsive">
                    <table class="table">
                        </hr>
                        <caption> 
                            <p ALIGN="center">                           
                                <?php echo 'Turno solicitado el dia: ' . $fechaAltaReserva .' a las ' .$horaAltaReserva .' hs' ;?>
                            </p>
                            <p ALIGN="center">                           
                                Recuerda que puedes cancelar esta reserva de turno hasta 24 hs previas a la misma.
                            </p>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>                       
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                            
                                <td>id de reserva: </td>
                                <th scope="row"><?php echo $ultimoReservaId;?></th>
                            
                            </tr>
                            <tr>
                                <td>Nombre y Apellido: </td>
                                <th scope="row"><?php echo $cliente->nombreCliente.' '.$cliente->apellidoCliente;?></th>                          
                            </tr>
                            <tr>
                                <td>DNI: </td>
                                <th scope="row"><?php echo $cliente->dniCliente;?></th>                          
                            </tr>
                            <tr>
                                <td>Correo: </td>
                                <th scope="row"><?php echo $cliente->mailCliente;?></th>                          
                            </tr>
                            <tr>
                                <td>Teléfono: </td>
                                <th scope="row"><?php echo $cliente->telefono1Cliente;?></th>                          
                            </tr>
                            <tr>
                                <td>Motivo  : </td>
                                <th scope="row"><?php echo $nombreSector.' - '.$nombreOperacion;?></th>                          
                            </tr>
                            <tr>
                                <td>Dia y hora: </td>
                                <th scope="row"><?php echo $nombreDia.'  '.$fechaReserva.' a las '.$horaReserva.' hs';?></th>                          
                            </tr>
                        
                        </tbody>
                    </table>
                    </hr>
                    <p ALIGN="justify">Tu turno quedó asignado para asistir en las instalaciones de Cocucci Inmobiliaria<br> ubicadas en Paramericana 2875 - Godoy Cruz - Mendoza.
                            Piso 1 - Oficina C - Palmares Open Mall.<br>
                            No olvides traer tu DNI y recordá que este comprobante te 
                            servirá para circular desde tu domicilio hasta la sucursal, así como para ser atendido en Cocucci Inmobiliaria.</p>
                    </hr>
                </div><!-- / table-responsive -->
                <div class="form-holder text-center" >  
                    <!--<button type="button" onclick="javascript:window.print()">Imprimir</button>-->
                    <input type="button" id="desaparece" class="btn btn-primary btn-lg" onClick="imprimir()" value="Imprimir"> 
                </div><!-- / form-holder --> 
            </div><!-- / wizard-form -->
        </div><!-- / wizard-v1-content -->              
	</div><!-- / page-content -->
    
    <script src="assets\js\personalizadas\functions.js">						
    </script>		
</body>
</html>