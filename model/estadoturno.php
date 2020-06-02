<?php 

    class EstadoTurno{

        private $pdo;
        private $idEstadoTurno;
        private $nombreEstadoTurno;   
        private $descripcionEstadoTurno; 

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdEstadoTurno() {
            return $this->idEstadoTurno;
        }
        public function getNombreEstadoTurno() {
            return $this->nombreEstadoTurno;
        }
        public function getDescripcionEstadoTurno() {
            return $this->descripcionEstadoTurno;
        }
        public function setDescripcionEstadoTurno($descTurno){
            $this->descripcionEstadoTurno=$descTurno;
        }
         //Setters
        public function setIdEstadoTurno(int $idEdoTurno){
            $this->idEstadoTurno=$idEdoTurno;
        }
        public function setNombreEstadoTurno(string $nombreEdoTurno){
            $this->nombreEstadoTurno=$nombreEdoTurno;
        }

    }


?>