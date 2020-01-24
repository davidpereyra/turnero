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
        public function ValidarLogin($user, $pass, $puesto){
            try{ 
                $consulta="SELECT * FROM USUARIO where NOMBREUSUARIO='$user' AND PASSUSUARIO='$pass'";
                $login = $this->pdo->prepare($consulta);
                $login->execute();   
                
                $numero_registro=$login->rowCount();

                if($numero_registro!=0){

                   /*$set_online=$this->pdo->prepare("UPDATE `usuario` 
                                                    SET `usuario`.`online` = TRUE 
                                                        WHERE `usuario`.`nombreUsuario` = '$user'");

                    $set_online->execute();*/
                    session_start();//inicia sesion
                    //almacena usuario de la sesion
                    $_SESSION["usuario"]=$user;
                    $_SESSION["puesto"]=$puesto;
                    $valor = True;
                }else{
                    $valor = False;
                }                                                               
                return $valor;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

/* --------------------------------------------------------------------------------------- */

        public function UsuariosOnline(){
            try{ 
                $userOnline=$this->pdo->prepare("SELECT * FROM `usuario` WHERE `usuario`.`online` = 1");

                $userOnline->execute();
                return $userOnline->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


/* --------------------------------------------------------------------------------------- */

        public function OnlineOff($user){
            try{ 
                $set_ofline=$this->pdo->prepare("UPDATE `usuario` 
                                                            SET `usuario`.`online` = 0 
                                                                WHERE `usuario`.`nombreUsuario` = '$user'");

                $set_ofline->execute();
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


/* --------------------------------------------------------------------------------------- */

        public function OnlineOn($user){
            try{ 
                $set_ofline=$this->pdo->prepare("UPDATE `usuario` 
                                                            SET `usuario`.`online` = 1 
                                                                WHERE `usuario`.`nombreUsuario` = '$user'");

                $set_ofline->execute();
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
/* --------------------------------------------------------------------------------------- */

public function getUsuarioPorNombre($user_name){
    try{ 
        $get_user=$this->pdo->prepare("SELECT * FROM `usuario` WHERE `usuario`.`nombreUsuario` = '$user_name';");

        $get_user->execute();

        return $get_user->fetch(PDO::FETCH_OBJ);
    
    }catch(Exception $e){
        die($e->getMessage());
    }
}
/* --------------------------------------------------------------------------------------- */

}


?>