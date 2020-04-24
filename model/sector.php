<?php 

    class Sector{

        private $pdo;
        private $idSector;
        private $nombreSector;    
        private $visible;
        private $nomenclaturaSector;    

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
        public function setIdOperacion(int $idOpe){
            $this->idOperacion=$idOp;
        }
        public function setIdSector(int $idSec){
            $this->idSector=$idSec;
        }
        public function setNombreOperacion(string $nombreOp){
            $this->nombreOperacion=$nombreOp;
        }
        public function setNomenclaturaOperacion(string $nomenclaturaOp){
            $this->nomenclaturaOperacion=$nomenclaturaOp;
        }


/* ----------------------------------------------------------------------------------------------------------------------*/
        public function BuscarNomenclatura($idSec){
            try{
                $consulta="SELECT (NOMENCLATURASECTOR) FROM SECTOR WHERE IDSECTOR=$idSec;";
                $stmt = $this->pdo->prepare($consulta);
                $stmt->execute();
                $resultado =  $stmt->fetchColumn();
                return $resultado;
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
        public function GetSectores(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `sector` WHERE `sector`.`visible` = TRUE;");                            
                $consulta->execute();     
                return $consulta->fetchAll(PDO::FETCH_OBJ);

            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/


    }


?>