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
<<<<<<< HEAD
        public function ConsultarPerfilUsuario($idUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `perfil`
                INNER JOIN `usuarioperfil` ON `perfil`.`idPerfil` = `usuarioperfil`.`idPerfil`
                WHERE `usuarioperfil`.`idUsuario` = $idUsuario;");
                
                $consulta->execute();                

                return $consulta->fetch(PDO::FETCH_OBJ);
=======
        public function ConsultarPerfilUsuario($nombreUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `perfil`
                INNER JOIN `usuario` ON `perfil`.`idPerfil` = `usuario`.`idPerfil`
                WHERE `usuario`.`nombreUsuario` = '$nombreUsuario'");
                
                $consulta->execute();                

            return $consulta->fetch(PDO::FETCH_OBJ);
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
<<<<<<< HEAD


//-----------------------------------------------------------------------------------------------------------------------

        public function ConsultarPerfiles(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `perfil`;");
                
                $consulta->execute();                

                return $consulta->fetchAll(PDO::FETCH_OBJ);
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
     
//-----------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------



//-----------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------------------------------------

}

=======
}

//-----------------------------------------------------------------------------------------------------------------------

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
?>