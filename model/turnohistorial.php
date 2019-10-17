<?php 

    class TurnoHistorial{

        private $pdo;
        private $idTurnoHistorial;
        private $idEstadoTurno;
        private $idTurno;
        private $fechaAlta;
        private $fechaBaja;

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }

        //Getters
        public function getIdTurnoHistorial() {
            return $this->idTurnoHistorial;
        }
        public function getIdEstadoTurno(){
            return $this->idEstadoTurno;
        }
        public function getFechaAlta(){
            return $this->fechaAlta;
        }
        public function getFechaBaja(){
            return $this->fechaBaja;
        }
        public function getIdTurno(){
            return $this->idTurno;
        }
        //Setters
        public function setIdTurnoHistorial($idTurHis){
            $this->idTurnoHistorial=$idTurHis;
        }
        public function setIdEstadoTurno($idEdoTur){
            $this->idEstadoTurno=$idEdoTur;
        }
        public function setFechaAlta($fechaA){
            $this->fechaAlta=$fechaA;
        }
        public function setFechaBaja($fechaB){
            $this->fechaBaja=$fechaB;
        }
        public function setIdTurno($idTur){
            $this->idTuno=$idTur;
        }



        public function CrearTurnoHistorial($idTur,$idEdoTur){
            try{
               // $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno) VALUES (?,?);";
                $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno,fechaAlta) VALUES (:idTur,:idEdoTur,:fechaAlta);";
                $stmt = $this->pdo->prepare($consulta);
                

                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                //$fechaA = date_default_timezone_get();
                
                $stmt->execute(array(":idTur"=>intval($idTur), ":idEdoTur"=>($idEdoTur),":fechaAlta"=>($fechaA)));

                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function ContarTurnosDelDia($idOp){
            try{
               
                $consulta="SELECT (IDSECTOR) FROM OPERACION WHERE IDOPERACION=$idOp;";
                $stmt = $this->pdo->prepare($consulta);
                $stmt->execute();
                $resultado =  $stmt->fetch(PDO::FETCH_ASSOC);
                return intval($resultado);
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }





    }
 /*
function getDateForDatabase($date) {
    $timestamp = strtotime($date);
    $date_formated = date('Y-m-d H:i:s', $timestamp);
    return $date_formated;
}

*/

?>