<?php
require_once "model/turno.php";
//require_once "model/turnohistorial.php";
class InicioControlador{
    private $modelo;
    public function __CONSTRUCT(){
        $this->modelo=new Turno();
        //$this->modelo=new TurnoHistorial();
    }
    public function Inicio(){
        //$bd = Database::Conectar();
        //require_once "view/turno/operacion_view.php";
        require_once "view/headturno.php";
        require_once "view/turno/video.php";
        require_once "view/footerturno.php";
    }
    public function SeleccionarOp(){
      
        require_once "view/headturno.php";
        require_once "view/turno/seleccionaroperacion.php";
        require_once "view/footerturno.php";
    }

    public function GenerarTurno(){
        $t=new Turno();
        //$t->setIdSector(23);
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdSector($_POST['idOperacion']);
        //$t->setPrioridad($_POST['discapacidad']);
       // echo "Sector" . ($_POST['idSector']);
        $this->modelo->Insertar($t);
        
        //header("location:?c=turnos");
    }

/* 
    public function CrearTurnoHistorial(){
        $thc=new TurnoHistorial();
        $thc->idTurnoHistorial(23);
        $thc->setIdTurno($_POST['idTurno']);
        $thc->setIdEstadoTurno(1);
        //$t->setPrioridad($_POST['discapacidad']);
       // echo "Sector" . ($_POST['idSector']);
        $this->modelo->Insertar($t);
        
        header("location:?c=turnos");
    }*/


}
?>