<?php
require_once "model/usuario.php";
require_once "model/turno.php";
require_once "model/turnohistorial.php";
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
            $sector = $_POST['selectSector'];
            $puesto = $_POST['selectPuesto'];
            
        
            $valor = $claseUser->ValidarLogin($user, $pass, $puesto);
            
            if ($valor){
                header("location:?c=usuario&a=InicioDash");	
            }else{
                header("location:?c=usuario&a=Login");
            }
            
        }
        public function InicioDash(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/contentInicial.php"; 
            require_once "view/dash/sidebarderecho1.php";                 
            require_once "view/dash/footerDash.php";
            $t=new Turno();
            $listadeturnos = $t->ListarTurnosCreados();//tengo que hacer que sea para este perfil
            return $listadeturnos;
        }
        public function Logout(){
            session_start();
            session_destroy();
            header("location:?c=usuario&a=Login");
        }

        public function Llamar(){
            $nombreUsuario = $_POST['nombreUsuario'];             
            $turno=new Turno();
            $siguiente= $turno->LlamarTurno($nombreUsuario);
            $idTur = $siguiente->idTurno;
        
            $nropuesto= $_POST['nroPuesto'];
            $turno->InsertarBox($idTur,$nropuesto);
            $turnohistorial=new TurnoHistorial();
            $turnohistorial->ActualizarEstado($idTur,2);//2 es el estado LLAMADO



            if($siguiente){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/contentInicial.php"; 
            require_once "view/dash/sidebarderecho2.php";         
            require_once "view/dash/footerDash.php";  
            }else{
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/contentInicial.php"; 
            require_once "view/dash/sidebarderecho2.php";         
            require_once "view/dash/footerDash.php";                  
            }
           
        }

    }

?>