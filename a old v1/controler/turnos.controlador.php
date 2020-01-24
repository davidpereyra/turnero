<?php
require_once "model/turno.php";
    class TurnosControlador{
        private $modelo;
        public function __CONSTRUCT(){
            $this->modelo=new Turno();
    
        }

        public function Inicio(){
            
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

        

        
    }

?>