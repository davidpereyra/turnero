<?php
require_once "model/turno.php";

class TurnosWebControlador{
    private $modelo;    
    public function __CONSTRUCT(){
        $this->modelo=new Turno();        
    }
    public function Inicio(){       
        require_once "view/headturno.php";
        require_once "view/turnosweb/index.php";
        $jqueryLocal = true;
        require_once "view/footerturno.php";
    }
    




#---------------------------------------------------------------------------------------------------------------------------------------
}
?>