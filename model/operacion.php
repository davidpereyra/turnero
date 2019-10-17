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


?>