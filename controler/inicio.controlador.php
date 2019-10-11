<?php
require_once "model/turno.php";
require_once "model/turnohistorial.php";
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
        $t=new Turno();
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdSector($_POST['idOperacion']);
        
        $uid = $this->modelo->Insertar($t);
        echo "<br>".($uid)." de tipo ".gettype($uid) . "en inicio controlador";
        
        $thcreate=new TurnoHistorial();
        
        $thcreate->CrearTurnoHistorial($uid,1);//creado es (_,1)
       
        header("location:../turnero");
    } 


}
?>