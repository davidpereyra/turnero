<?php 

    class Perfil{

        private $pdo;
        private $idPerfil;
        private $nombrePerfil;    
        
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdPerfil() {
            return $this->idPerfil;
        }
        public function getNombrePerfil() {
            return $this->nombrePerfil;
        }

         //Setters
        public function setIdPerfil(int $idPer){
            $this->idPerfil=$idPer;
        }
        public function setNombrePerfil(string $nomPer){
            $this->nombrePerfil=$nomPer;
        }

    }


?>