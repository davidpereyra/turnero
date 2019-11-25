<?php
require __DIR__ . '/../escpos-php/vendor/autoload.php';

//<script src="/turnero/escpos-php/vendor/autoload.php"></script>
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
$nombre_impresora = "EPSON20";

$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);

echo 1;

$printer->setJustification(Printer::JUSTIFY_CENTER);
try {
    $logo = EscposImage::load("assets\img\logotext.png");  //LOGO CON TEXTO A LADO
    //$logo = EscposImage::load("assets\img\logo_cocucci_text01.png");//SOLO TEXTO DEL LOGO
    $printer->bitImage($logo);
} catch (Exception $e) {
    //throw $th;
}
$printer->setTextSize(1,1);
$printer->text("\n"."Su turno es: "."\n"."\n");

date_default_timezone_set('America/Argentina/Mendoza');
$fecha = date('H:i:s    d-m-Y');

//NOMBRE de turno
$printer->setTextSize(4,4);
$printer->text($imprimir->nomenclaturaSector . $imprimir->nomenclaturaOperacion ." ". $imprimir->nombreTurno."\n");

$printer->setTextSize(1,1);
$printer->text("\n"."Por favor aguarde a ser llamado."."\n");
$printer->text("\n"."Gracias por su visita."."\n");
$printer->text("\n"."-----------------------------------------"."\n");
$printer->text($fecha);
$printer->text("\n"."-----------------------------------------"."\n");


$printer->feed(3);
$printer->cut();
$printer->pulse();
$printer->close();