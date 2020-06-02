<?php 

    class UsuarioPerfil{

        private $pdo;
        private $idUsuarioPerfi;
        private $idUsuario;    
        private $idPerfil;
        private $comentarioUsuarioPerfil;    

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdUsuarioPerfi() {
            return $this->idUsuarioPerfi;
        }
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        public function getIdPerfil() {
            return $this->idPerfil;
        }
        public function getComentarioUsuarioPerfil() {
            return $this->comentarioUsuarioPerfil;
        }

         //Setters
        public function setOdUsuarioPerfi($idOpePer){
            $this->idUsuarioPerfi=$idOpePer;
        }
        public function setIdSector($idUser){
            $this->idUsuario=$idUser;
        }
        public function setIdPerfil($idPe){
            $this->idPerfil=$idPe;
        }
        public function setComentarioUsuarioPerfil($comUserPerf){
            $this->comentarioUsuarioPerfil=$comUserPerf;
        }

     

//// METODOS
        public function getPerfilUsuarioPorIdUsuario($idUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `usuarioperfil`                
                WHERE `usuarioperfil`.`idUsuario` = $idUsuario;");
                
                $consulta->execute();                

                return $consulta->fetch(PDO::FETCH_OBJ);
            
            }catch(Exception $e){
                die($e->getMessage());
            }
}



//---------------------------------------------------------------------------------------------------------------//


    }


?>