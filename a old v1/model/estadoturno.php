<?php 

    class EstadoTurno{

        private $pdo;
        private $idEstadoTurno;
        private $nombreEstadoTurno;    

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

         //Setters
        public function setIdEstadoTurno(int $idEdoTurno){
            $this->idEstadoTurno=$idEdoTurno;
        }
        public function setNombreEstadoTurno(string $nombreEdoTurno){
            $this->nombreEstadoTurno=$nombreEdoTurno;
        }

    }


?>