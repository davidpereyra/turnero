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
        public function setIdUsuario($idUser){
            $this->idUsuario=$idUser;
        }
        public function setIdPerfil($idPer){
            $this->idPerfil=$idPer;
        }
        public function setNombreUsuario($nombreUser){
            $this->nombreUsuario=$nombreUser;
        }
        public function setPassUsuario($passUser){
            $this->passUsuario=$passUser;
        }
        
        //Methods
        public function ValidarLogin($user, $pass){
            try{ 
                $consulta="SELECT NOMBREUSUARIO,PASSUSUARIO FROM USUARIO where NOMBREUSUARIO='$user' AND PASSUSUARIO='$pass'";
                $login = $this->pdo->prepare($consulta);
                $login->execute();    
                  
            

                $numero_registro=$login->rowCount();

                if($numero_registro!=0){
                    session_start();//inicia sesion
                    $_SESSION["usuario"]=$user;//almacena usuario de la sesion
                   
                    $valor = True;
                }else{
                    $valor = False;
                }                                                               
                return $valor;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }



    }


?>