<?php
require_once "model/turno.php";
    class TurnosControlador{
        private $modelo;
        public function __CONSTRUCT(){
            $this->modelo=new Turno();
    
        }

        public function Inicio(){
            
            require_once "view/headturno.php";
            require_once "view/llamador/index.php";
            require_once "view/footerturno.php";
        }

        
    }

?>