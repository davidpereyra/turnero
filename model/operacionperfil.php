<?php 

    class OperacionPerfil{

        private $pdo;
        private $idOpPerfil;
        private $idPerfil;    
        private $idOperacion;
        private $comentario;    

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdOpPerfil() {
            return $this->idOpPerfil;
        }
        public function getIdPerfil() {
            return $this->idPerfil;
        }
        public function getIdOperacion() {
            return $this->idOperacion;
        }
        public function getComentario() {
            return $this->comentario;
        }

         //Setters
        public function setIdOpPerfil(int $idOpPer){
            $this->idOpPerfil=$idOpPerfil;
        }
        public function setIdPerfil(int $idPer){
            $this->idPerfil=$idPer;
        }
        public function setIdOperacion(int $idOp){
            $this->idOperacion=$idOp;
        }
        public function setComentario(string $ctario){
            $this->comentario=$ctario;
        }

    }


?>