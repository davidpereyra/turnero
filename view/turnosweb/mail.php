
    
    <?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
    $from = "no-reply@cocucci.com.ar";
    $to = $cliente->mailCliente;
    $subject = "Reserva de turno en Cocucci Inmobiliaria";
    
    $message = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Document</title>
    </head>
    <body>
        <p style='font-size: 20px;'>Tu turno se ha reservado con exito:</p>
        <p></p>
        <p>Id de reserva: " . $ultimoReservaId . "</p>
        <p>Nombre: " .  $cliente->nombreCliente . "</p>
        <p>Apellido: " .  $cliente->apellidoCliente . "</p>
        <p>DNI: " .  $cliente->dniCliente . "</p>
        <p>Email: " .  $cliente->mailCliente . "</p>
        <p>Teléfono: " .  $cliente->telefono1Cliente . "</p>
        <p>Sector: " .  $nombreSector . "</p>
        <p>Operación: " .  $nombreOperacion . "</p>
        <p>Fecha de turno: " .   $nombreDia . '  '.$fechaReserva. "</p>
        <p>Hora de turno:" .  $horaReserva . "</p>
        <p>Comentario del cliente:" . $comentarioReserva. "</p>       
    </body>
    </html>";
    $headers .= "From:" . $from;
    
    mail($to,$subject,$message, $headers);
     "The email message was sent.";

?>
