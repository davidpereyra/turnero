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

//Metodos
        public function ConsultarPerfilUsuario($idUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `perfil`
                INNER JOIN `usuarioperfil` ON `perfil`.`idPerfil` = `usuarioperfil`.`idPerfil`
                WHERE `usuarioperfil`.`idUsuario` = '$idUsuario'");
                
                $consulta->execute();                

                return $consulta->fetch(PDO::FETCH_OBJ);
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
}

//-----------------------------------------------------------------------------------------------------------------------

?>