<?php
require_once "model/usuario.php";
    class UsuarioControlador{
        private $modelo;
        public function __CONSTRUCT(){
            $this->modelo=new Usuario();
    
        }

        public function Login(){
            
            require_once "view/headturno.php";
            require_once "view/dash/index.php";
            require_once "view/footerturno.php";
        }
        public function ValidarLogin(){
            $claseUser=new Usuario();
            $user = $_POST['nombreUsuario'];
            $pass = $_POST['passUsuario'];
            $valor = $claseUser->ValidarLogin($user, $pass);
            
            if ($valor){
                header("location:?c=usuario&a=InicioDash");	
            }else{
                header("location:?c=usuario&a=Login");
            }
        }
        public function InicioDash(){
            //require_once "view/headturno.php";
            require_once "view/dash/starter.php";         
            //require_once "view/footerturno.php";
        }

        
    }

?>