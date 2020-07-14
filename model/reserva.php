<?php 

    class Reserva{

        private $pdo;
        private $idReserva;
        private $idCliente;    
        private $idSector;    
        private $idOperacion;    
        private $fechaReserva;    
        private $horaReserva;    
        private $comentarioReserva;    
        
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdReserva() {
            return $this->idReserva;
        }
        public function getIdCliente() {
            return $this->idCliente;
        }
        public function getIdSector() {
            return $this->idSector;
        }
        public function getIdOperacion(){
            return $this->idOperacion;
        }
        public function getFechaReserva() {
            return $this->fechaReserva;
        }
        public function getHoraReserva() {
            return $this->horaReserva;
        }
        public function getComentarioReserva() {
            return $this->comentarioReserva;
        }
         //Setters
        public function setIdReserva($IdReserved){
            $this->idReserva=$IdReserved;
        }
        public function setIdCliente($idCli){
            $this->idCliente=$idCli;
        }
        public function setIdSector($idS){
            $this->idSector=$idS;
        }
        public function setIdOperacion($idOp){
            $this->idOperacion=$idOp;
        }
        public function setFechaReserva($dateReserva){
            $this->fechaReserva=$dateReserva;
        }
        public function setHoraReserva($timeReserva){
            $this->horaReserva=$timeReserva;
        }
        public function setComentarioReserva($detailReserva){
            $this->comentarioReserva=$detailReserva;
        }
//Metodos
       public function CrearReserva(Reserva $r){
            try{               

                $consulta="INSERT INTO reserva(idReserva,idCliente,idSector,idOperacion,fechaReserva,horaReserva,comentarioReserva) VALUES(?,?,?,?,?,?,?);";
                
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $r->getIdReserva(),                            
                            $r->getIdCliente(),
                            $r->getIdSector(),
                            $r->getIdOperacion(),
                            $r->getFechaReserva(),
                            $r->getHoraReserva(),
                            $r->getComentarioReserva(),
                        ));
              

                $ultimoId=$this->pdo->prepare("SELECT idReserva FROM reserva ORDER BY idReserva DESC LIMIT 1;");
                $ultimoId->execute();

                if ($ultimoId) {
                    $uid = intval($ultimoId->fetchColumn());                   
                }               
                $ultimoId->closeCursor();
                return ($uid);
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
      
//-----------------------------------------------------------------------------------------------------------------------
        public function GetReservaPorId($idReserva){ 
            try{        
                $consulta=$this->pdo->prepare("SELECT * FROM `reserva`                           
                WHERE `reserva`.`idReserva` = $idReserva
                ;");                
                
                $consulta->execute();                            
                return $consulta->fetch(PDO::FETCH_OBJ);                    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
//-----------------------------------------------------------------------------------------------------------------------
        public function ReservasExistentesEnIntervalo($diaHabil,$hora,$rango,$operacion,$idEdoReserva){ 
            try{        
                $consulta=$this->pdo->prepare("SELECT `reserva`.`idReserva` FROM `reserva`           
                INNER JOIN `reservahistorial` ON `reserva`.`idReserva`=`reservahistorial`.`idReserva`
                INNER JOIN `operacion` ON `reserva`.`idOperacion` = `operacion`.`idOperacion`
                WHERE `reserva`.`fechaReserva` = '$diaHabil'
                AND `reserva`.`horaReserva` <= ADDTIME ('$hora','$rango')
                AND `reserva`.`horaReserva` >= SUBTIME ('$hora','$rango')
                AND `operacion`.`idOperacion` = '$operacion'
                AND `reservahistorial`.`idEstadoReserva` = $idEdoReserva
                ;");                
                
                $consulta->execute();                            
                return $consulta->fetch(PDO::FETCH_OBJ);                    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
//-----------------------------------------------------------------------------------------------------------------------
    public function ConsultarReservasClientePorEstado($idEstadoReserva,$idPerfil){ 
        try{        
            
            date_default_timezone_set('America/Argentina/Mendoza');
            $today = date('Y-m-d');
            $consulta=$this->pdo->prepare("SELECT DISTINCT `reserva`.`idReserva`,`operacion`.`nombreOperacion`,`reserva`.`fechaReserva`,`reserva`.`horaReserva`,`reserva`.`comentarioReserva`,
            `cliente`.`nombreCliente`,`cliente`.`apellidoCliente`,`cliente`.`dniCliente`,`cliente`.`telefono1Cliente`,`cliente`.`mailCliente`,
            `reservahistorial`.`fechaAltaReserva`, `reservahistorial`.`horaAltaReserva`
            FROM `reserva`           
            INNER JOIN `reservahistorial` ON `reserva`.`idReserva`=`reservahistorial`.`idReserva`
            INNER JOIN `operacion` ON `reserva`.`idOperacion` = `operacion`.`idOperacion`
            INNER JOIN `cliente` ON `reserva`.`idCliente` = `cliente`.`idCliente`
            INNER JOIN `operacionperfil` ON `operacionperfil`.`idOperacion` = `operacion`.`idOperacion`
            WHERE `reservahistorial`.`idEstadoReserva` = $idEstadoReserva 
            AND `reserva`.`fechaReserva` >= '$today'     
            AND `reservahistorial`.`fechaBajaReserva` IS NULL
            AND `reservahistorial`.`horaBajaReserva` IS NULL
            AND `operacionperfil`.`idPerfil` = $idPerfil
            ;");                
            
            $consulta->execute();                            
            return $consulta->fetchAll(PDO::FETCH_OBJ);                    
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


//-----------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------------------------------------

}

?>