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
    $logo = EscposImage::load("assets\img\logo_cocucci_text.png");
    $printer->bitImage($logo);
} catch (Exception $e) {
    //throw $th;
}

$printer->text("\n"."Su turno es: "); ?>
<h1> 
    <?php $printer->text($imprimir->nomenclaturaSector . $imprimir->nomenclaturaOperacion ." ". $imprimir->nombreTurno,"\n"); ?>
</h1>    
<?php
$printer->text("\n"."Por favor aguarde a ser llamado.","\n");
$printer->text("\n"."Gracias por su visita.","\n");

//   EJEMPLO PARA IMPRIMIR VARIABLES
//$hola= "texto en variable";
//$printer->text($hola);


$printer->feed(3);
$printer->cut();
$printer->pulse();
$printer->close();