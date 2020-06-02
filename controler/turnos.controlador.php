<?php
require_once "model/turno.php";
    class TurnosControlador{
        private $modelo;
        public function __CONSTRUCT(){
            $this->modelo=new Turno();
    
        }

<<<<<<< HEAD
        public function Inicio(){//no se usa
=======
        public function Inicio(){
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            
            require_once "view/headturno.php";
            require_once "view/llamador/ejemplo de tabla.php";
            require_once "view/footerturno.php";
        }

        public function Llamados(){    
                    
            require_once "view/headturno2.php";           
            require_once "view/llamador/called.php";
            require_once "view/footerturno2.php";
        }

        public function Llamar(){     
                   
            require_once "view/headturno2.php";           
            require_once "view/llamador/call.php";
            require_once "view/footerturno.php";
            
        }

<<<<<<< HEAD
//-----------------------------------------------------------------------------------------------------------//
=======


        public function test(){            
            require_once "view/headturno.php";
            //require_once "view/llamador/called.php";

           

            
            $UltimoLlamado = $this->modelo->MostrarUltimoLlamado();
            if ($UltimoLlamado){
                echo $UltimoLlamado->idTurno . "<br>";
            }else {
                
                echo "no hay algo";
            }





            foreach($this->modelo->ListarTurnosLlamados() as $listarTurnos):
                
                echo "TURNO " .$listarTurnos->nomenclaturaSector . $listarTurnos->nomenclaturaOperacion ." ". $listarTurnos->nombreTurno ."<br>";
                echo "BOX " .$listarTurnos->box;
                
            endforeach;

            require_once "view/footerturno.php";
        }

        

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
        
    }

?>