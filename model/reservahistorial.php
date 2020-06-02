<?php 

    class ReservaHistorial{

        private $pdo;
        private $idReservaHistorial;
        private $idReserva;    
        private $idEstadoReserva;    
        private $idUsuario;
        private $fechaAltaReserva;    
        private $horaAltaReserva;    
        private $fechaBajaReserva;    
        private $horaBajaReserva;    
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdReservaHistorial() {
            return $this->idReservaHistorial;
        }
        public function getIdReserva() {
            return $this->idReserva;
        }
        public function getIdEstadoReserva() {
            return $this->idEstadoReserva;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function getFechaAltaReserva() {
            return $this->fechaAltaReserva;
        }
        public function getHoraAltaReserva() {
            return $this->horaAltaReserva;
        }
        public function getFechaBajaReserva() {
            return $this->fechaBajaReserva;
        }
        public function getHoraBajaReserva() {
            return $this->horaBajaReserva;
        }
        
         //Setters
        
        public function setIdReservaHistorial($idResHist) {
            $this->idReservaHistorial=$idResHist;
        }
        public function setIdReserva($IdReserved){
            $this->idReserva=$IdReserved;
        }
        public function setIdEstadoReserva($idEdoRes) {
            $this->idEstadoReserva=$idEdoRes;
        }
        public function setIdUsuario($idUser){
            $this->idUsuario=$idUser;
        }
        public function setFechaAltaReserva($dateAltaRes) {
            $this->fechaAltaReserva=$dateAltaRes;
        }
        public function setHoraAltaReserva($timeAltaRes) {
            $this->horaAltaReserva=$timeAltaRes;
        }
        public function setFechaBajaReserva($dateBajaRes) {
            $this->fechaBajaReserva=$dateBajaRes;
        }
        public function setHoraBajaReserva($timeBajaRes) {
            $this->horaBajaReserva=$timeBajaRes;
        }
//Metodos       

/* -------------------------------------------------------------------------------------------   */

/* -------------------------------------------------------------------------------------------   */
        public function CrearReservaHistorial(ReservaHistorial $rh){
            try{               

                //$consulta="INSERT INTO reservahistorial(idReservaHistorial,idReserva,idEstadoReserva,idUsuario,fechaAltaReserva,horaAltaReserva,fechaBajaReserva,horaBajaReserva) VALUES(?,?,?,?,?,?,?,?);";
                $consulta="INSERT INTO reservahistorial(idReserva,idEstadoReserva,idUsuario,fechaAltaReserva,horaAltaReserva,fechaBajaReserva,horaBajaReserva) VALUES(?,?,?,?,?,?,?);";
                
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            //$rh->getIdReservaHistorial(),
                            $rh->getIdReserva(),
                            $rh->getIdEstadoReserva(),
                            $rh->getIdUsuario(),
                            $rh->getFechaAltaReserva(), 
                            $rh->getHoraAltaReserva(), 
                            $rh->getFechaBajaReserva(),
                            $rh->getHoraBajaReserva(), 
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
        public function GetReservaHistorialPorIdReserva($idReserva){ 
            try{        
                $consulta=$this->pdo->prepare("SELECT * FROM `reservahistorial`                           
                WHERE `reservahistorial`.`idReserva` = $idReserva
                ;");                
                
                $consulta->execute();                            
                return $consulta->fetch(PDO::FETCH_OBJ);                    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -----------------------------------------------------------------------------------------------------------------------

public function InsertarReservaHistorial($idReserva,$idEstadoReserva){
    try{
        date_default_timezone_set('America/Argentina/Mendoza');
        $fechaAltaReserva = date('Y-m-d');
        $horaAltaReserva = date('H:i:s');
        $consulta="INSERT INTO reservahistorial(idReserva, idEstadoReserva,fechaAltaReserva,horaAltaReserva) VALUES (:idReserva,:idEstadoReserva,:fechaAltaReserva,:horaAltaReserva);";
        $stmt = $this->pdo->prepare($consulta);
        
        $stmt->execute(array(":idReserva"=>intval($idReserva), ":idEstadoReserva"=>($idEstadoReserva),":fechaAltaReserva"=>($fechaAltaReserva),":horaAltaReserva"=>($horaAltaReserva)));
        $stmt->closeCursor();
    }
    catch(Exception $e){
        die($e->getMessage());
    }
}
-------------------------------------------------------------------------------------------   */
        public function CierraEstadoReserva($idReserva){
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaActualReserva = date('Y-m-d');
                $horaActualReserva = date('H:i:s');                  
                $update=$this->pdo->prepare("UPDATE `reservahistorial`
                                            SET `reservahistorial`.`fechaBajaReserva`= '$fechaActualReserva',
                                            `reservahistorial`.`horaBajaReserva`= '$horaActualReserva'
                                            WHERE `reservahistorial`.`idReserva`='$idReserva';");
                $update->execute();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
//-----------------------------------------------------------------------------------------------------------------------
//no probado pero similar al de turno historial - inserta un estado historial nuevo registrando id de usuario que realiza
        public FUNCTION InsertarReservaHistorialUsuario($idReserva,$idEstadoReserva,$idUsuario){ 
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaActual = DATE('Y-m-d');                
                $horaActual = DATE('H:i:s');                
                $consulta="INSERT INTO reservahistorial(idReserva, idEstadoReserva,idUsuario,fechaAltaReserva,horaAltaReserva) VALUES (?,?,?,?,?);";
                $this->pdo->PREPARE($consulta)
                        ->EXECUTE(array(
                            intval($idTur),
                            $idEdoTur,
                            $idUsuario,
                            $fechaActual,
                            $horaActual,                            
                        ));
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

//-----------------------------------------------------------------------------------------------------------------------
// similar al de turno historial - actualiza estado reserva partiendo de id reserva e inserta un estado historial nuevo registrando id de usuario que realiza
        public function ActualizarEstadoReservaConUsuario($idReserva,$idEstadoReserva,$idUsuario){ 
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaActual = date('Y-m-d');
                $horaActual = date('H:i:s');
                
                $update=$this->pdo->prepare("UPDATE `reservahistorial`
                                            SET `reservahistorial`.`fechaBajaReserva` = '$fechaActual', 
                                            `reservahistorial`.`horaBajaReserva`='$horaActual',
                                            `reservahistorial`.`idUsuario` = $idUsuario
                                            WHERE `reservahistorial`.`idReserva` = $idReserva;");
                $update->execute();
                $consulta="INSERT INTO reservahistorial(idReserva, idEstadoReserva,idUsuario,fechaAltaReserva,horaAltaReserva) VALUES (:idReserva,:idEstadoReserva,:idUsuario,:fechaAltaReserva,:horaAltaReserva);";
                $stmt = $this->pdo->prepare($consulta);                    
                $stmt->execute(array(":idReserva"=>intval($idReserva), ":idEstadoReserva"=>($idEstadoReserva),":idUsuario"=>($idUsuario), ":fechaAltaReserva"=>($fechaActual),":horaAltaReserva"=>($horaActual)));
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
//-----------------------------------------------------------------------------------------------------------------------



}

?>