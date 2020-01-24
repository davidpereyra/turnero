<?php 

    class Operacion{

        private $pdo;
        private $idOperacion;
        private $idSector;    
        private $nombreOperacion;
        private $nomenclaturaOperacion;    

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdOperacion() {
            return $this->idOperacion;
        }
        public function getIdSector() {
            return $this->idSector;
        }
        public function getNombreOperacion() {
            return $this->nombreOperacion;
        }
        public function getNomenclaturaOperacion() {
            return $this->nomenclaturaOperacion;
        }

         //Setters
        public function setIdOperacion($idOpe){
            $this->idOperacion=$idOp;
        }
        public function setIdSector($idSec){
            $this->idSector=$idSec;
        }
        public function setNombreOperacion($nombreOp){
            $this->nombreOperacion=$nombreOp;
        }
        public function setNomenclaturaOperacion($nomenclaturaOp){
            $this->nomenclaturaOperacion=$nomenclaturaOp;
        }

        public function BuscarSector($idOp){
            try{
               
                $consulta=$this->pdo->prepare("SELECT `operacion`.`idSector` FROM `operacion` WHERE `operacion`.`idOperacion` = $idOp;");
                $consulta->execute();
                
                return $consulta->fetch(PDO::FETCH_OBJ);
               
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

//// METODOS


        public function ListarOperacionesPerfil($nombreUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion`
                INNER JOIN `operacionperfil` ON `operacionperfil`.`idOperacion`=`operacion`.`idOperacion`
                INNER JOIN `usuario` ON `operacionperfil`.`idPerfil` = `usuario`.`idPerfil`
                WHERE `usuario`.`nombreUsuario` = '$nombreUsuario' 
                ORDER BY `operacionperfil`.`operacionPrioridad` DESC");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
//---------------------------------------------------------------------------------------------------------------//


        public function ListarOperacionesPerfilesActivos(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion`
                INNER JOIN `operacionperfil` ON `operacion`.`idOperacion`=`operacionperfil`.`idOperacion`
                INNER JOIN `perfil` ON `operacionperfil`.`idPerfil` = `perfil`.`idPerfil`
                INNER JOIN `usuario` ON `perfil`.`idPerfil`=`usuario`.`idPerfil`
                WHERE `usuario`.`online`=1 AND `operacion`.`nombreOperacion` != 'Por orden' GROUP BY `operacion`.`nombreOperacion` ASC");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
//---------------------------------------------------------------------------------------------------------------//



//---------------------------------------------------------------------------------------------------------------//


    }


?>