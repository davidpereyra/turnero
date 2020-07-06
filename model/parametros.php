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
        function SumarDiasHabiles($fecha,$dias){
            $datestart= strtotime($fecha);
            $datesuma = 15 * 86400;
            $diasemana = date('N',$datestart);
            $totaldias = $diasemana+$dias;
            $findesemana = intval( $totaldias/5) *2 ; 
            $diasabado = $totaldias % 5 ; 
            if ($diasabado==6) $findesemana++;
            if ($diasabado==0) $findesemana=$findesemana-2;
        
            $total = (($dias+$findesemana) * 86400)+$datestart ; 
            return $twstart=date('Y-m-d', $total);
        }
//------------------------------------------------------------------------------------------------
        function ObtenerRangoHabil(){ //calculo modelo de un lapso de tiempo dividido un periodo
	        $var1 = '08:00';
            $var2 = '13:00';
            $intervarlo = '15';
            $fechaInicio = new DateTime($var1);
            $fechaFin = new DateTime($var2);
            $fechaFin = $fechaFin->modify( '+15 minutes' ); 
            $rangoFechas = new DatePeriod($fechaInicio, new DateInterval('PT30M'), $fechaFin);
            
            foreach($rangoFechas as $fecha){
                $listafecha[] = $fecha->format("H:i") . PHP_EOL;
            }
            return $listafecha;
        }
//------------------------------------------------------------------------------------------------
        function get_nombre_dia($fecha){ //llega una fecha y devuelve el dia de la semana es español
            $fechats = strtotime($fecha); //pasamos a timestamp        
        //el parametro w en la funcion date indica que queremos el dia de la semana
        //lo devuelve en numero 0 domingo, 1 lunes,....
            switch (date('w', $fechats)){
                case 0: return "Domingo"; break;
                case 1: return "Lunes"; break;
                case 2: return "Martes"; break;
                case 3: return "Miercoles"; break;
                case 4: return "Jueves"; break;
                case 5: return "Viernes"; break;
                case 6: return "Sabado"; break;
            }
        }
	

//------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
        function round_time( $time, $round_to_minutes = 5, $type = 'auto' ) {//si 16:15 - redondea hacia arriba a los 5 minutos
            $round = array( 'auto' => 'round', 'up' => 'ceil', 'down' => 'floor' );
            $round = @$round[ $type ] ? $round[ $type ] : 'round';
            $seconds = $round_to_minutes * 60;
            if(substr_count($time,":")==2)
              return date( 'H:i:s', $round( strtotime( $time ) / $seconds ) * $seconds );
            else
              return date( 'H:i', $round( strtotime( $time ) / $seconds ) * $seconds );
          }
           // echo "<br>".round_time("16:12",30, "up"); 


//------------------------------------------------------------------------------------------------
}

?>