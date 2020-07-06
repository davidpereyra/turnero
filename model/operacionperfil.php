<?php 

    class OperacionPerfil{

        private $pdo;
        private $idOpPerfil;
        private $idPerfil;    
        private $idOperacion;
        private $comentarioPerfil;    
        private $operacionPrioridad; 

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
        public function getComentarioPerfil() {
            return $this->comentarioPerfil;
        }
        public function getOperacionPrioridad() {
            return $this->operacionPrioridad;
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
        public function setComentarioPerfil(string $comentProfile){
            $this->comentarioPerfil=$comentProfile;
        }
        public function setOperacionPrioridad(string $opPri){
            $this->operacionPrioridad=$opPri;
        }


//Metodos
public function ConsultarPrioridad($nombreUsuario,$nombrePri){
    try{
        $consulta=$this->pdo->prepare("SELECT `operacionperfil`.`operacionPrioridad` FROM `operacion` 
        INNER JOIN `operacionperfil` ON `operacion`.`idOperacion` = `operacionperfil`.`idOperacion`
        INNER JOIN `usuario` ON `operacionperfil`.`idPerfil` = `usuario`.`idPerfil`
        WHERE `usuario`.`nombreUsuario` = '$nombreUsuario'
        AND `operacion`.`nombreOperacion` = '$nombrePri'");
        
        $consulta->execute();                

       return $consulta->fetch(PDO::FETCH_OBJ);
       
    }catch(Exception $e){
        die($e->getMessage());
    }
}

//-----------------------------------------------------------------------------------------------------------------------





    }


?>