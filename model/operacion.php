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

    }


?>