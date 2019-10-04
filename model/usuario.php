<?php 

    class Usuario{

        private $pdo;
        private $idUsuario;
        private $idPerfil;
        private $nombreUsuario;
        private $passUsuario;

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        public function getIdPerfil() {
            return $this->idPerfil;
        }
        public function getNombreUsuario() {
            return $this->nombreUsuario;
        }
        public function getPassUsuario() {
            return $this->passUsuario;
        }
         //Setters
        public function setIdUsuario(int $idUser){
            $this->idUsuario=$idUser;
        }
        public function setIdPerfil(int $idPer){
            $this->idPerfil=$idPer;
        }
        public function setNombreUsuario(string $nombreUser){
            $this->nombreUsuario=$nombreUser;
        }
        public function setPassUsuario(string $passUser){
            $this->passUsuario=$passUser;
        }
        
    }


?>