<?php 

    class Parametros{

        private $pdo;
        private $fechaNacimiento;
        
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdUsuario() {
            return $this->idUsuario;
        }
         //Setters
        public function setIdUsuario($idUser){
            $this->idUsuario=$idUser;
        }
        
        //Methods
        public function CalcularEdad($fechaNacimiento){
            try{ 
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaActual = date('Y-m-d H:i:s');

                                
             
                $fechaActual = date('Y-m-d'); // la fecha del ordenador
                
                //echo "<p>Diferencia entre la fecha ".$fechaNacimiento." la fecha ".$fechaActual."</p>";
                
                // Obtenemos la diferencia en milisegundos
                $diff = abs(strtotime($fechaActual) - strtotime($fechaNacimiento));
                
                //echo "</br> Años ";
                $years = floor($diff / (365*60*60*24));
                //echo "</br> Meses ";
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                //echo "</br> Días ";
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                //echo "</br>";

                $valor = $years." Años, ".$months." Meses, ".$days." dias";

                return $valor;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

/* --------------------------------------------------------------------------------------- */


//------------------------------------------------------------------------------------------------
}


?>