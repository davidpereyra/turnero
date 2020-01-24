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
        require_once "view/menu.html";
    }

    public function selectTurno(){
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
        $cliente = new Cliente();
        $idOperacion = $_POST['idOperacion']; 
        $idSector = $_POST['idSector']; 
        $dniCli = intval($_POST['dni']);        
        
        $idCli = $cliente->ConsultarId($dniCli);
        //Turno
        $t=new Turno();
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdOperacion($idOperacion);
        $t->setIdSector($idSector);
        if($dniCli){
            $t->setIdCliente($idCli);
        }
        $uid = $this->modelo->InsertarTurno($t); //$uid es el idTurno
        
        //turno historial
        $thcreate=new TurnoHistorial();
        $thcreate->CrearTurnoHistorial($uid,1);//creado es (_,1)

        //Busca turno recien creado para imprimir en ticket

        $imprimir = $t->TurnoPorId($uid);

        //include "view/imprimir.php";
        
        header("location:../turnero/?c=inicio&a=selectTurno");
        
    }




    
}
?>