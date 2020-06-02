<?php 

    class EstadoTurno{

        private $pdo;
        private $idEstadoTurno;
<<<<<<< HEAD
        private $nombreEstadoTurno;   
        private $descripcionEstadoTurno; 
=======
        private $nombreEstadoTurno;    
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f

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
<<<<<<< HEAD
        public function getDescripcionEstadoTurno() {
            return $this->descripcionEstadoTurno;
        }
        public function setDescripcionEstadoTurno($descTurno){
            $this->descripcionEstadoTurno=$descTurno;
        }
=======

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
         //Setters
        public function setIdEstadoTurno(int $idEdoTurno){
            $this->idEstadoTurno=$idEdoTurno;
        }
        public function setNombreEstadoTurno(string $nombreEdoTurno){
            $this->nombreEstadoTurno=$nombreEdoTurno;
        }

    }


?>