<?php
require_once "model/turno.php";
require_once "model/turnohistorial.php";
require_once "model/cliente.php";
require_once "model/sector.php";

class InicioControlador{
    private $modelo;
    public $thcreate;
    public function __CONSTRUCT(){
        $this->modelo=new Turno();
        //$this->modelo=new TurnoHistorial();
    }
    public function Inicio(){
        //$bd = Database::Conectar();
        //require_once "view/turno/operacion_view.php";
        require_once "view/headturno.php";
        require_once "view/turno/index.php";
        require_once "view/footerturno.php";
    }
    public function SeleccionarOp(){
      
        require_once "view/headturno.php";
        require_once "view/turno/seleccionaroperacion.php";
        require_once "view/footerturno.php";
    }

    public function GenerarTurno(){
        $idOperacion = $_POST['idOperacion']; 
        $idSector = $_POST['idSector']; 

        //$sec=new Sector();
        //$nomSec = $sec->BuscarNomenclatura($nroSec);

        $t=new Turno();
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdOperacion($idOperacion);
        $t->setIdSector($idSector);
        //$t->setNombreTurno($nomSec);
        $uid = $this->modelo->InsertarTurno($t);
        echo "<br>".($uid)." de tipo ".gettype($uid) . "en inicio controlador";
        //turno historial
        $thcreate=new TurnoHistorial();
        $thcreate->CrearTurnoHistorial($uid,1);//creado es (_,1)
        //cliente
        $cliente=new Cliente();
        $dnicli = intval($_POST['dni']);
        echo "<br>".($dnicli)." de dni ".gettype($dnicli) . "en inicio controlador";
        $cliente->InsertarDniCliente($dnicli,$uid);
       
                

        header("location:../turnero");
    } 
}
?>