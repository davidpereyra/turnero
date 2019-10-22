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
      //cliente
        
        $dnicli = intval($_POST['dni']);
        $cliente=new Cliente();
        $dniValidado = $cliente->InsertarDniCliente($dnicli);
        require_once "view/headturno.php";
        require_once "view/turno/seleccionaroperacion.php";
        require_once "view/footerturno.php";
    }

    public function GenerarTurno(){
        $idOperacion = $_POST['idOperacion']; 
        $idSector = $_POST['idSector']; 
        $dnicli = intval($_POST['dni']);
        //$sec=new Sector();
        //$nomSec = $sec->BuscarNomenclatura($nroSec);

        //Turno
        $t=new Turno();
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdOperacion($idOperacion);
        $t->setIdSector($idSector);
        $t->setDniCliente($dnicli);
        
        $uid = $this->modelo->InsertarTurno($t);
        
        //turno historial
        $thcreate=new TurnoHistorial();
        $thcreate->CrearTurnoHistorial($uid,1);//creado es (_,1)
        
        
        header("location:../turnero");
    } 
}
?>