<?php 

    class Sector{

        private $pdo;
        private $idSector;
        private $nombreSector;    
        private $nomenclaturaSector;    
        private $visibleTotem;
        private $visibleWeb;

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
        public function getVisibleTotem() {
            return $this->visibleTotem;
        }
        public function getVisibleWeb() {
            return $this->visibleWeb;
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
        public function setVisibleTotem($vtotem) {
            $this->visibleTotem=$vtotem;
        }
        public function setVisibleWeb($vWeb) {
            $this->visibleWeb=$vWeb;
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
        public function GetSectoresTotem(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `sector` WHERE `sector`.`visibleTotem` = TRUE");                            
                $consulta->execute();     
                return $consulta->fetchAll(PDO::FETCH_OBJ);

            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
        public function GetSectoresWeb(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `sector` WHERE `sector`.`visibleWeb` = TRUE");                            
                $consulta->execute();     
                return $consulta->fetchAll(PDO::FETCH_OBJ);

            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
        public function BuscarSectorPorNombre($nombreSector){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `sector`
                            WHERE `sector`.`nombreSector` = '$nombreSector';");
                
                $consulta->execute();                
                return $consulta->fetch(PDO::FETCH_OBJ);
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
      

    }


?>