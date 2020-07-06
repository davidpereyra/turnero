<?php 

    class TurnoHistorial{
        private $pdo;
        private $idTurnoHistorial;
        private $idTurno;
        private $idEstadoTurno;
        private $fechaAlta;
        private $fechaBaja;
        private $idUsuario;
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        //Getters
        public function getIdTurnoHistorial() {
            return $this->idTurnoHistorial;
        }
        public function getIdTurno(){
            return $this->idTurno;
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
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        //Setters
        public function setIdTurnoHistorial($idTurHis){
            $this->idTurnoHistorial=$idTurHis;
        }
        public function setIdTurno($idTur){
            $this->idTuno=$idTur;
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
        public function setIdUsuario($idUsr){
            $this->idUsuario=$idUsr;
        }
/* -------------------------------------------------------------------------------------------   */
        public function InsertarTurnoHistorial($idTur,$idEdoTur){
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                //$fechaA = date_default_timezone_get();
               // $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno) VALUES (?,?);";
                $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno,fechaAlta) VALUES (:idTur,:idEdoTur,:fechaAlta);";
                $stmt = $this->pdo->prepare($consulta);
                
                $stmt->execute(array(":idTur"=>intval($idTur), ":idEdoTur"=>($idEdoTur),":fechaAlta"=>($fechaA)));
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */
        public function InsertarTurnoHistorialUsuario($idTur,$idEdoTur,$idUsuario){
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                //$fechaA = date_default_timezone_get();
            // $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno) VALUES (?,?);";
                $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno,fechaAlta,idUsuario) VALUES (?,?,?,?);";
                $this->pdo->PREPARE($consulta)
                        ->EXECUTE(array(
                            intval($idTur),
                            $idEdoTur,
                            $fechaA,
                            $idUsuario,
                        ));
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */
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
/* -------------------------------------------------------------------------------------------   */
        public function ActualizarEstado($idTur,$idEdoTur){ 
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                    //$fechaB = date('Y-m-d H:i:s');
                    //CAST((NOW()) AS DATE) 
                $update=$this->pdo->prepare("UPDATE `turnohistorial`
                                                    SET `turnohistorial`.`fechaBaja`= NOW()
                                                        WHERE `turnohistorial`.`idTurno`=$idTur
                                                        AND `turnohistorial`.`fechaBaja` IS NULL;");
                $update->execute();
                $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno,fechaAlta) VALUES (:idTur,:idEdoTur,:fechaAlta);";
                $stmt = $this->pdo->prepare($consulta);                    
                $stmt->execute(array(":idTur"=>intval($idTur), ":idEdoTur"=>($idEdoTur),":fechaAlta"=>($fechaA)));
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */
//cierra historial antarior y crea uno nuevo
        public function ActualizarEstadoAsociadoUsuario($idTur,$idEdoTur,$idUser){                     
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                //$fechaB = date('Y-m-d H:i:s');
                //CAST((NOW()) AS DATE) 
                $update=$this->pdo->prepare("UPDATE `turnohistorial`
                                                SET `turnohistorial`.`fechaBaja`= NOW(), `turnohistorial`.`idUsuario` = $idUser
                                                    WHERE `turnohistorial`.`idTurno`=$idTur;");
                $update->execute();
                $consulta="INSERT INTO turnohistorial(idTurno, idEstadoTurno,fechaAlta,idUsuario) VALUES (:idTur,:idEdoTur,:fechaAlta,:idUsuario);";
                $stmt = $this->pdo->prepare($consulta);                
                $stmt->execute(array(":idTur"=>intval($idTur), ":idEdoTur"=>($idEdoTur),":fechaAlta"=>($fechaA),":idUsuario"=>($idUser)));
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */
//cierra historial antarior sin crear uno nuevo
        public function ActualizarEstadoAsociadoUsuarioCierre($idTur,$idEdoTur,$idUser){                     
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                //$fechaB = date('Y-m-d H:i:s');
                //CAST((NOW()) AS DATE) 
                $update=$this->pdo->prepare("UPDATE `turnohistorial`
                                                SET `turnohistorial`.`fechaBaja`= NOW(), `turnohistorial`.`idUsuario` = $idUser
                                                    WHERE `turnohistorial`.`idTurno`=$idTur;");
                $update->execute();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */
        public function CierraEstado($idTur){             
            try{
                date_default_timezone_set('America/Argentina/Mendoza');
                $fechaA = date('Y-m-d H:i:s');
                    //$fechaB = date('Y-m-d H:i:s');
                    //CAST((NOW()) AS DATE) 
                $update=$this->pdo->prepare("UPDATE `turnohistorial`
                        SET `turnohistorial`.`fechaBaja`= NOW()
                        WHERE `turnohistorial`.`idTurno`=$idTur
                        AND `turnohistorial`.`fechaBaja` IS NULL;");
                $update->execute();                   
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

    
/* -------------------------------------------------------------------------------------------   */
        public function TurnosExistentesEnIntervalo($diaHora,$rangoValido,$idEstadoTurno){ 
            try{        
                $consulta=$this->pdo->prepare("SELECT * FROM `turnohistorial` 
                    WHERE `turnohistorial`.`fechaBaja` IS NULL
                    AND  `turnohistorial`.`fechaAlta` = '$diaHora'
                    AND  `turnohistorial`.`fechaAlta`<= ADDTIME ('$diaHora','$rangoValido')
                    AND  `turnohistorial`.`fechaAlta`>= SUBTIME ('$diaHora','$rangoValido')
                    AND `turnohistorial`.`idEstadoTurno` = $idEstadoTurno              
                                ;");
                $consulta->execute();                            
                return $consulta->fetch(PDO::FETCH_OBJ);                    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
/* -------------------------------------------------------------------------------------------   */





/* -------------------------------------------------------------------------------------------   */

}

?>