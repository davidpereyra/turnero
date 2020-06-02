<?php
require_once "model/usuario.php";
require_once "model/turno.php";
require_once "model/turnohistorial.php";
require_once "model/cliente.php";
require_once "model/operacion.php";
require_once "model/operacionperfil.php";
require_once "model/perfil.php";
<<<<<<< HEAD
require_once "model/usuarioperfil.php";
require_once "model/parametros.php";
require_once "model/reserva.php";
require_once "model/reservahistorial.php";
require_once "model/reservaturno.php";
=======

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f



    class UsuarioControlador{
        private $modelo;
        public function __CONSTRUCT(){
            $this->modelo=new Usuario();
    
        }

<<<<<<< HEAD
/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE SESION
--------------------------------------------------------------------------------------------------------------*/

        public function Login(){                     
=======
        public function Login(){
            
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            require_once "view/headturno.php";
            require_once "view/dash/index.php";
            require_once "view/footerturno.php";
        }
        public function ValidarLogin(){
<<<<<<< HEAD
            
            $user = $_POST['nombreUsuario'];
            $pass = $_POST['passUsuario'];            
            $puesto = $_POST['selectPuesto'];    
            
            $claseUser=new Usuario();
            $usuarioBD = $claseUser -> getUsuarioPorNombre($user);
            /*$claseUser->setNombreUsuario($user);
            $claseUser->setPassUsuario($pass);
            $claseUser->setNroPuesto($puesto);*/
            
            $username = $usuarioBD->nombreUsuario;
            $password = $usuarioBD->passUsuario;
            $nroPuesto = $usuarioBD->nroPuesto;
            $logeado = $usuarioBD->online;                    
            
            $puestosUsados = $claseUser->VerificaPuesto($puesto);
            
            //$valor = TRUE;
            if($logeado == TRUE){
                $msg="Este usuario ya inicio sesión en el puesto ".$nroPuesto;
                //$valor = FALSE;
            }elseif($user != $username){
                $msg = "No existe nombre de usuario";
                //$valor = FALSE;
            }elseif($pass != $password){
                $msg = "Password incorrecto";
                //$valor = FALSE;
            }elseif($puestosUsados){
                $otroUsuario = $puestosUsados->nombreUsuario;
                $msg = "Puesto utilizado por usuario *".$otroUsuario;
                //$valor = FALSE;
            }
            $valor = $claseUser->ValidarLogin($user, $pass, $puesto);
            if ($valor){
                $claseUser->OnlineOn($user,$puesto); 
                #para menu
                $claseUser = new Usuario();
                $usuario = $claseUser->getUsuarioPorNombre($user);
                $idUsuario = $usuario->idUsuario;
                $op=new Operacion();
                $_SESSION['permisoUsuario'] = array();
                $_SESSION['permisoUsuario'] = $op->ListarPermisosGestionUsuario($idUsuario);
                header("location:?c=usuario&a=InicioDash");	                
            }else{
                
                header("location:?c=usuario&a=Login&msg=$msg");
                die();
            }                        
=======
            $claseUser=new Usuario();
            $user = $_POST['nombreUsuario'];
            $pass = $_POST['passUsuario'];
            //$sector = $_POST['selectSector'];
            $puesto = $_POST['selectPuesto'];               
            $valor = $claseUser->ValidarLogin($user, $pass, $puesto);            
            if ($valor){
                $claseUser->OnlineOn($user); 
                header("location:?c=usuario&a=InicioDash");	                
            }else{
                header("location:?c=usuario&a=Login");
            }
                        
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
        }


        public function InicioDash(){     
            $op=new Operacion();
            $t=new Turno();            
            $perfil = new Perfil();
<<<<<<< HEAD
            $claseUser = new Usuario();            
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";            
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION["usuario"]);
            $idUsuario = $usuario->idUsuario;                    
            $_SESSION['permisoUsuario'] = array();
            $_SESSION['permisoUsuario'] = $op->ListarPermisosGestionUsuario($idUsuario);            
            //$nombreUsuario = $usuario->nombreUsuario;
            $listadeturnos = $t->ListarTurnosUsuario($idUsuario);
            $listadeoperaciones = $op->ListarOperacionesPerfil($idUsuario);
            $usuarioPerfil = $perfil -> ConsultarPerfilUsuario($idUsuario);               
            $idPerfil = $usuarioPerfil->idPerfil;   
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/atencion/contentdash.php";
            if($idPerfil != 11){ //11 es el perfil de recepcion                                     
                require_once "view/dash/atencion/sidebarderecho1.php";                            
            }else{
                require_once "view/dash/atencion/sidebarderecho_vacio.php";                             
            }
            require_once "view/dash/footerDash.php";
        }
        public function Logout(){
            $claseUser=new Usuario();
            $user = $_POST['nombreUsuario'];
            $claseUser->OnlineOff($user);             
=======
            

           
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            $listadeturnos = $t->ListarTurnosSector($_SESSION["usuario"]);
            require_once "view/dash/contentdash.php"; 
            $listadeoperaciones = $op->ListarOperacionesPerfil($_SESSION["usuario"]);
            $nombrePerfil = $perfil -> ConsultarPerfilUsuario($_SESSION["usuario"]);
            if($nombrePerfil->nombrePerfil != "RecepcionPerfil"){
                                     
                require_once "view/dash/sidebarderecho1.php";              
                require_once "view/dash/footerDash.php";
            }
            
        }


        public function Logout(){
            $claseUser=new Usuario();
            $user = $_POST['nombreUsuario'];
            $claseUser->OnlineOff($user); 
            
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            session_start();
            session_destroy();
            header("location:?c=usuario&a=Login");
        }
<<<<<<< HEAD
/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE TURNOS
--------------------------------------------------------------------------------------------------------------*/
        public function Llamar(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $nombreUsuarioPost = $_POST['nombreUsuario']; 
            $idOperacion = $_POST['idOperacion'];
           
            $turno=new Turno();
            /* Viendo si lo pongo en una sola funcion
=======

        public function Llamar(){
            $nombreUsuario = $_POST['nombreUsuario']; 
            $opNombre = $_POST['operacionNombre'];
           
            $turno=new Turno();
           

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                if($opNombre == "Por orden"){
                    $siguiente= $turno->LlamarTurnoPorOrden($nombreUsuario);
                
                }else if ($opNombre == "Derivado"){
                    $siguiente= $turno->LlamarTurnoConPrioridad($nombreUsuario);
                }else{
                    $op = new OperacionPerfil();
                    $opPri = $op -> ConsultarPrioridad($nombreUsuario,$opNombre); 
                    $opPrioridad = $opPri->operacionPrioridad;             
                    $siguiente= $turno->LlamarTurnoOperacion($nombreUsuario, intval($opPrioridad));
<<<<<<< HEAD
                } */
            //siguiente es el turno seleccionado para llamar
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($nombreUsuarioPost);
            $idUsuario = $usuario->idUsuario;
            $nombreUsuario = $usuario->nombreUsuario;
            if($idOperacion == 10){//"Por orden"                
                $siguiente= $turno->LlamarTurnoPorOrden($idUsuario);
            }else if ($idOperacion == 13){//Discapacidad
                $siguiente= $turno->LlamarTurnoDiscapacidad($idUsuario);
            }else if ($idOperacion == 11){//Derivado
                //$siguiente= $turno->LlamarTurnoConPrioridad($nombreUsuario);
                $siguiente= $turno->LlamarTurnoDerivado($idUsuario);
            }else{                                
                $siguiente= $turno->LlamarTurno($idUsuario,$idOperacion);
            } 
                    
            if($siguiente){
                $idTur = $siguiente->idTurno;
                $nropuesto= $_POST['nroPuesto'];
                $turno->InsertarBox($idTur,$nropuesto);
                $turno->RellamarTrue($idTur);
                
                $turnohistorial=new TurnoHistorial();
                
                /*$claseUser=new Usuario();
                $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuario->idUsuario;*/
                
                $turnohistorial->ActualizarEstadoAsociadoUsuario($idTur,2,$idUsuario);//2 es el estado LLAMADO
                
               
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/atencion/contentdash2.php"; 
                require_once "view/dash/atencion/sidebarderecho2.php";         
                require_once "view/dash/footerDash.php";  
            }else{           
                header("location:?c=usuario&a=InicioDash");	
                               
            }
            
            
        }

        public function ReLlamar(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $nombreUsuario = $_POST['nombreUsuario'];             
            $idTurno = $_POST['idTurno'];             
            $turno=new Turno();
            $siguiente= $turno->ReLlamarTurno( $idTurno);   
            $usuario = new Usuario();
            $usuario = $usuario->getUsuarioPorNombre($nombreUsuario);
            if(!$siguiente){          
                header("location:?c=usuario&a=InicioDash");	                  
            }           
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/atencion/contentdash2.php"; 
            require_once "view/dash/atencion/sidebarderecho3.php";         
            require_once "view/dash/footerDash.php";  
           
        }

        public function Atender(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
=======
                } 
                    
                if($siguiente){
                    $idTur = $siguiente->idTurno;
                    $nropuesto= $_POST['nroPuesto'];
                    $turno->InsertarBox($idTur,$nropuesto);
                    $turno->RellamarTrue($idTur);

                    $claseUser=new Usuario();
                    $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
                    $idUser = $usuarioLlamador->idUsuario;

                    $turnohistorial=new TurnoHistorial();
                    $turnohistorial->ActualizarEstadoAsociadoUsuario($idTur,2,$idUser);//2 es el estado LLAMADO
                    require_once "view/dash/headerDash.php";
                    require_once "view/dash/head.php";
                    require_once "view/dash/sidebarMenu.php";
                    require_once "view/dash/contentdash2.php"; 
                    require_once "view/dash/sidebarderecho2.php";         
                    require_once "view/dash/footerDash.php";  
                }else{           
                    header("location:?c=usuario&a=InicioDash");	
                               
                }
            
        }



        public function ReLlamar(){
            $nombreUsuario = $_POST['nombreUsuario'];             
            $idTurno = $_POST['idTurno'];             
            $turno=new Turno();
            $siguiente= $turno->ReLlamarTurno( $idTurno);            
            if($siguiente){              
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash2.php"; 
                require_once "view/dash/sidebarderecho3.php";         
                require_once "view/dash/footerDash.php";  
            }else{           
                header("location:?c=usuario&a=InicioDash");	                  
            }
           
        }


        public function Atender(){
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $turno->DejarDeLlamar($idTurno);
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){

                $claseUser=new Usuario();
<<<<<<< HEAD
                $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuario->idUsuario;                
                $turnohistorial=new TurnoHistorial();
                $turnohistorial->ActualizarEstadoAsociadoUsuario($idTurno,3,$idUser);//3 es el estado ATENDIDO
                
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/atencion/contentdash3.php"; 
                require_once "view/dash/atencion/sidebarderecho4.php";         
=======
                $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuarioLlamador->idUsuario;

                $turnohistorial=new TurnoHistorial();
                $turnohistorial->ActualizarEstadoAsociadoUsuario($idTurno,3,$idUser);//3 es el estado ATENDIDO
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash3.php"; 
                require_once "view/dash/sidebarderecho4.php";         
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                require_once "view/dash/footerDash.php";  
            }else{           
                header("location:?c=usuario&a=InicioDash");	                  
            }
           
        }

<<<<<<< HEAD
=======

>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
        public function Ausente(){
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){
                $turnohistorial=new TurnoHistorial();
                $claseUser=new Usuario();
<<<<<<< HEAD
                $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuario->idUsuario;                
=======
                $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuarioLlamador->idUsuario;
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                $turnohistorial->ActualizarEstadoAsociadoUsuario($idTurno,4,$idUser);//4 es el estado AUSENTE
                $turnohistorial->CierraEstado($idTurno);

                header("location:?c=usuario&a=InicioDash");	                  
            }
           
        }
        public function Finaliza(){
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){
                $turnohistorial=new TurnoHistorial();
                $turnohistorial->CierraEstado($idTurno);
                header("location:?c=usuario&a=InicioDash");	        
            }
        }

        public function DerivarActual(){
<<<<<<< HEAD
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
=======
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $actual= $turno->TurnoActual($idTurno);            
            if($actual){
                $turnohistorial=new TurnoHistorial();
                $turnohistorial->CierraEstado($idTurno); //cierra el estado ATENDIENDO
                $turnohistorial->ActualizarEstado($idTurno,5);//5 es el estado DERIVADO
                $claseUser=new Usuario();
                $claseOperacion=new Operacion();
                $usersOnline = $claseUser -> UsuariosOnline();
                $opUserOnline = $claseOperacion ->ListarOperacionesPerfilesActivos();
<<<<<<< HEAD
                $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
                
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/atencion/contentdash4.php"; 
                //require_once "view/dash/atencion/sidebarderecho_vacio.php";         
=======
                
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash4.php"; 
                require_once "view/dash/sidebarderecho_vacio.php";         
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                require_once "view/dash/footerDash.php";        
            }
           
        }

        public function DerivarPorOperacion(){   
<<<<<<< HEAD
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
=======
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            $cliente=new Cliente();
            $turnohistorial=new TurnoHistorial();

            $nombreUsuario = $_POST['nombreUsuario'];
            $comentarioTurno = $_POST['comentarioTurno'];           
            $idOperacion = $_POST['selectOperacion']; 
            $dniCliente = $_POST['dniCliente'];
            $idTurnoActual = $_POST['idTurnoActual'];
            $idTurno = $_POST['idTurno'];
            //$turnohistorial->CierraEstado($idTurnoActual);

            $claseUser=new Usuario();
<<<<<<< HEAD
            $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUser = $usuario->idUsuario;
            $turnohistorial->ActualizarEstadoAsociadoUsuarioCierre($idTurnoActual,5,$idUser);//5 es el estado DERIVADO
            
            $clienteValidado = $cliente->ConsultarCliente($dniCliente);    
            $idCli = $clienteValidado->idCliente;
            
            $operacion = new Operacion();
            $Sector = $operacion ->BuscarOperacionPorId(intval($idOperacion));
            $idSector = $Sector->idSector;
            $prioridad =0;
=======
            $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUser = $usuarioLlamador->idUsuario;
            $turnohistorial->ActualizarEstadoAsociadoUsuarioCierre($idTurnoActual,5,$idUser);//5 es el estado DERIVADO



            $idCli = $cliente->ConsultarId($dniCliente);          
            $operacion = new Operacion();
            $Sector = $operacion ->BuscarSector(intval($idOperacion));
            $idSector = $Sector->idSector;
            $prioridad = 1;


            


>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f

            //Turno
            $t=new Turno();
            $t->setIdTurno($idTurno);
            $t->setIdOperacion($idOperacion);            
            $t->setIdSector($idSector);
            $t->setIdCliente($idCli);
            $t->setComentario($comentarioTurno);
            $t->setPrioridad($prioridad);
            $t->setIdTurnoAnterior($idTurnoActual);
            $turnoDerivado = $t->InsertarTurnoDerivado($t,$nombreUsuario); //$uid es el idTurno
            
            //turno historial
            $uid = $turnoDerivado->idTurno;
            
<<<<<<< HEAD
            $turnohistorial->InsertarTurnoHistorial($uid,1);//creado es (_,1)
=======
            $turnohistorial->CrearTurnoHistorial($uid,1);//creado es (_,1)
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
    
            //Busca turno recien creado para imprimir en ticket
    
            $imprimir = $t->TurnoPorId($uid);
<<<<<<< HEAD
            
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/atencion/contentdash5.php"; 
            require_once "view/dash/atencion/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";   
        }
        
        public function DerivarPorUsuario(){   
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $cliente=new Cliente();
            $turnohistorial=new TurnoHistorial();
            $idUsuarioSeleccionado = $_POST['idUsuarioSeleccionado'];
            $nombreUsuario = $_POST['nombreUsuario'];
            $comentarioTurno = $_POST['comentarioTurno'];  
            $dniCliente = $_POST['dniCliente'];
            $idTurnoActual = $_POST['idTurnoActual'];
            $idTurno = $_POST['idTurno'];
            
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUser = $usuario->idUsuario;
            $turnohistorial->ActualizarEstadoAsociadoUsuarioCierre($idTurnoActual,5,$idUser);//5 es el estado DERIVADO

            
            $clienteValidado = $cliente->ConsultarCliente($dniCliente);    
            $idCli = $clienteValidado->idCliente;
            
            $operacion = new Operacion();
            $Sector = $operacion ->BuscarOperacionPorId(intval(17));//el id de la atencion personalizada es 17 
            $idSector = $Sector->idSector;
            $prioridad = 0;
            
            //Turno
            $t=new Turno();
            $t->setIdTurno($idTurno);
            $t->setIdOperacion(intval(17));            
            $t->setIdSector($idSector);
            $t->setIdCliente($idCli);
            $t->setComentario($comentarioTurno);
            $t->setPrioridad($prioridad);
            $t->setIdTurnoAnterior($idTurnoActual);
            $turnoDerivado = $t->InsertarTurnoDerivado($t,$nombreUsuario); //$uid es el idTurno 
            //el nombre de usuario todavia no lo uso y puede que haya que quitarlo despues
            
            //turno historial
            $uid = $turnoDerivado->idTurno;
            
            $turnohistorial->InsertarTurnoHistorialUsuario($uid,1,$idUsuarioSeleccionado);//creado es (_,1)
    
            //Busca turno recien creado para imprimir en ticket
    
            $imprimir = $t->TurnoPorId($uid);
            
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/atencion/contentdash5.php"; 
            //require_once "view/dash/atencion/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";   
        }


/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE DATOS DEL CLIENTE
--------------------------------------------------------------------------------------------------------------*/

        public function ActualizarDatosCliente(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
=======
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/contentdash5.php"; 
            require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";   
        }
        


        public function ActualizarDatosCliente(){
           
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            $cli = new Cliente();
            $turno=new Turno();

            $idTurno = intval($_POST['idTurno']);
            $dniCli = intval($_POST['dniCliente']);  
            $rsCli = $_POST['razonSocialCliente']; 
            $cuitCli = $_POST['cuitCliente'];        
            $nomCli = $_POST['nombreCliente']; 
            $apeCli = $_POST['apellidoCliente'];
            $cuilCli = $_POST['cuilCliente'];  
            $mailCli = $_POST['mailCliente'];
            $tel1Cli = $_POST['telefono1Cliente'];
            $tel2Cli = $_POST['telefono2Cliente'];
<<<<<<< HEAD
            $comentCli = $_POST['comentarioCliente'];      
=======
            $comentCli = $_POST['comentarioCliente'];
            
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            $idCli = $turno->ConsultarId($idTurno);
           

            $cli->setIdCliente($idCli);
            $cli->setDniCliente($dniCli);
            $cli->setRazonSocialCliente($rsCli);
            $cli->setCuitCliente($cuitCli);
            $cli->setNombreCliente($nomCli);
            $cli->setApellidoCliente($apeCli);
            $cli->setCuitCliente($cuilCli);
            $cli->setMailCliente($mailCli);
            $cli->setTelefono1Cliente($tel1Cli);
            $cli->setTelefono2Cliente($tel2Cli);
            $cli->setComentarioCliente($comentCli);

<<<<<<< HEAD
            $c = $cli->ActualizarCliente($cli);
=======
            $c = $cli->ActualizarDatos($cli);
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
            
            
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){                           
<<<<<<< HEAD
                $claseUser=new Usuario();
                $usuario = $claseUser->getUsuarioPorNombre($_SESSION[usuario]);
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/atencion/contentdash3.php"; 
                require_once "view/dash/atencion/sidebarderecho4.php";         
=======
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash3.php"; 
                require_once "view/dash/sidebarderecho4.php";         
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                require_once "view/dash/footerDash.php";  	                  
            }

            
        }

<<<<<<< HEAD
        
/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE MENUS DE NAVEGACION
--------------------------------------------------------------------------------------------------------------*/



/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE PERFIL DE USUARIO
--------------------------------------------------------------------------------------------------------------*/

        public function UserProfile(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            
            $usuario = new Usuario();
            $usuario = $usuario->getUsuarioPorNombre($_SESSION['usuario']); 
            $fechaNacimiento = $usuario->fechaNacimiento;
            //formato fecha para Mostrar
            $dateNacimiento = date("d-m-Y", strtotime($fechaNacimiento)); 
            
            $param1 = new Parametros();
            $edad =$param1->CalcularEdad($dateNacimiento);
            require_once "view/dash/sidebarMenu.php";       
            require_once "view/dash/users/contentEditProfile.php";        
            require_once "view/dash/footerDash.php";                            
        }

        public function ActualizarDatosUsuario(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $nombreReal = $_POST['nombreUser'];
            $apellidoReal = $_POST['apellidoUser'];
            $dniUsuario = $_POST['dniUser'];
            $rolUsuario = $_POST['rolUser'];
            $informacionAdicional = $_POST['infoAdicional'];
            $correoUsuario= $_POST['emailUser'];
            $telefonoInterno = $_POST['telInterno'];
            $telefonoPersonal = $_POST['telPersonal'];
            $telefonoEmergencia = $_POST['telContacto'];
            $nombreContacto = $_POST['nombreContacto'];
            $direccionEmergencia= $_POST['dirEmergencia'];
            $fechaNacimiento = $_POST['fechaNacimiento'];                       
            //formato fecha para BD
            $dateNacimiento = date("Y-m-d", strtotime($fechaNacimiento));

            $claseUser = new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);                        
            
            $claseUser->setIdUsuario($usuario->idUsuario);
            $claseUser->setNombreReal($nombreReal);
            $claseUser->setApellidoReal($apellidoReal);
            $claseUser->setDniUsuario($dniUsuario);
            $claseUser->setCorreoUsuario($correoUsuario);
            $claseUser->setRolUsuario($rolUsuario);                     
            $claseUser->setTelefonoInterno($telefonoInterno);
            $claseUser->setTelefonoPersonal($telefonoPersonal);
            $claseUser->setTelefonoEmergencia($telefonoEmergencia);
            $claseUser->setNombreContacto($nombreContacto);
            $claseUser->setDireccionEmergencia($direccionEmergencia);
            $claseUser->setInformacionAdicional($informacionAdicional);
            $claseUser->setFechaNacimiento($dateNacimiento);
            //$claseUser->setImgUsuario($imgUser);  para hacer todo de una hay que agregar el recibir imagen        
            $claseUser->ActualizarUsuario($claseUser);            
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            $fechaNacimiento = $usuario->fechaNacimiento;
            //formato fecha para Mostrar
            $dateNacimiento = date("d-m-Y", strtotime($fechaNacimiento));
            $param1 = new Parametros();
            $edad =$param1->CalcularEdad($dateNacimiento);
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/users/contentEditProfile.php";        
            require_once "view/dash/footerDash.php";                            
        }

        public function CambiarImagen(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";            
            //tratamiento de imagen
                        //Recibir
            $nombre_imagen = $_FILES['imgUser']['name'];
            $tipo_imagen = $_FILES['imgUser']['type'];
            $tamano_imagen = $_FILES['imgUser']['size'];            
            if($tamano_imagen<=1249000){
                if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif"){
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/turnero/assets/img/profiles/user/';
                    move_uploaded_file($_FILES['imgUser']['tmp_name'],$carpeta_destino.$nombre_imagen);
                } //else por msg de error po tipo
            }//else por msg de error por tamaño
            $imgUser =$nombre_imagen;            
            $claseUser = new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);            
            $claseUser->setIdUsuario($usuario->idUsuario);            
            $claseUser->setImgUsuario($imgUser);            
            $claseUser->ActualizarImagenUsuario($claseUser);            
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            $fechaNacimiento = $usuario->fechaNacimiento;
            //formato fecha para Mostrar
            $dateNacimiento = date("d-m-Y", strtotime($fechaNacimiento));
            $dateNacimiento = date("d-m-Y", strtotime($fechaNacimiento));
            $param1 = new Parametros();
            $edad =$param1->CalcularEdad($dateNacimiento);
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/users/contentEditProfile.php";        
            require_once "view/dash/footerDash.php";                            
        }

/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE USUARIOS
--------------------------------------------------------------------------------------------------------------*/

        public function AltaUsuario(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";  
            $nombreReal = $_POST['nombreUser'];
            $apellidoReal = $_POST['apellidoUser'];
            $dniUsuario = $_POST['dniUser'];
            $rolUsuario = $_POST['rolUser'];
            $informacionAdicional = $_POST['infoAdicional'];
            $correoUsuario= $_POST['emailUser'];
            $telefonoInterno = $_POST['telInterno'];
            $telefonoPersonal = $_POST['telPersonal'];
            $telefonoEmergencia = $_POST['telContacto'];
            $nombreContacto = $_POST['nombreContacto'];
            $direccionEmergencia= $_POST['dirEmergencia'];
            $fechaNacimiento = $_POST['fechaNacimiento'];                       
            //formato fecha para BD
            $dateNacimiento = date("Y-m-d", strtotime($fechaNacimiento));

            $claseUser = new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);                        
            
            $claseUser->setIdUsuario($usuario->idUsuario);
            $claseUser->setNombreReal($nombreReal);
            $claseUser->setApellidoReal($apellidoReal);
            $claseUser->setDniUsuario($dniUsuario);
            $claseUser->setCorreoUsuario($correoUsuario);
            $claseUser->setRolUsuario($rolUsuario);                     
            $claseUser->setTelefonoInterno($telefonoInterno);
            $claseUser->setTelefonoPersonal($telefonoPersonal);
            $claseUser->setTelefonoEmergencia($telefonoEmergencia);
            $claseUser->setNombreContacto($nombreContacto);
            $claseUser->setDireccionEmergencia($direccionEmergencia);
            $claseUser->setInformacionAdicional($informacionAdicional);
            $claseUser->setFechaNacimiento($dateNacimiento);
            
 //$claseUser->setImgUsuario($imgUser);  para hacer todo de una hay que agregar el recibir imagen        
 $claseUser->InsertarNuevoUsuario($claseUser);            
 $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
 $fechaNacimiento = $usuario->fechaNacimiento;
 //formato fecha para Mostrar
 $dateNacimiento = date("d-m-Y", strtotime($fechaNacimiento));
 $param1 = new Parametros();
 $edad =$param1->CalcularEdad($dateNacimiento);

           
            $perfil = new Perfil();
            $listaDePerfiles = $perfil->ConsultarPerfiles();
            $param1 = new Parametros();
            $edad =$param1->CalcularEdad($dateNacimiento);
            require_once "view/dash/sidebarMenu.php";       
            require_once "view/dash/users/altaNewUsers.php";         
            require_once "view/dash/footerDash.php";                            
        }
/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE HISTORIAL
--------------------------------------------------------------------------------------------------------------*/

        public function BuscarHistoricoUsuario(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            require_once "view/dash/sidebarMenu.php";
            
            require_once "view/dash/historial/buscarTurnosUsuario.php"; 
            //require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";                            
        }

        public function HistoricoTurnosUsuario(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            date_default_timezone_set('America/Argentina/Mendoza');
            $fechaDesde = $_POST['fechaDesde'];
            $fechaHasta = $_POST['fechaHasta'];
            
            //$fechaHasta = date("Y-m-d H:i:s", strtotime($DateF));

            $nombreUsuario = $_SESSION['usuario'];  
            
            //busco el id usuario
            $claseUser=new Usuario();
            $usuario  = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUsuario = $usuario ->idUsuario;
                 
            $turno=new Turno();
            $historicoVer = $turno-> ListarHistoricoUsuario($idUsuario,$fechaDesde,$fechaHasta);
            
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/historial/historicoTurnosUsuario.php"; 
            //require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";                            
        }

        public function BuscarHistoricoPerfil(){ 
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            require_once "view/dash/sidebarMenu.php";
            
            require_once "view/dash/historial/buscarTurnosPerfil.php"; 
            //require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";                            
        }

        public function HistoricoTurnosPerfil(){
            date_default_timezone_set('America/Argentina/Mendoza');
            $fechaDesde = $_POST['fechaDesde'];
            $fechaHasta = $_POST['fechaHasta'];
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            
            $nombreUsuario = $_SESSION['usuario'];  
            //busco el id usuario
            $claseUser=new Usuario();
            $usuario  = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idPerfil = $usuario->idPerfil;
                 
            $turno=new Turno();
            $historicoVer = $turno-> ListarHistoricoPerfil($idPerfil,$fechaDesde,$fechaHasta);
            
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/historial/historicoTurnosPerfil.php"; 
            //require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";        
            
        
        }

/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE ESTADISTICAS
--------------------------------------------------------------------------------------------------------------*/

    
        public function BuscarEstadisticasUsuario(){
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            
            require_once "view/dash/sidebarMenu.php";            
            require_once "view/dash/estadisticas/buscarEstadisticaUsuario.php";                   
            require_once "view/dash/footerDash.php";                            
        }


        public function EstadisticasUsuario(){
            date_default_timezone_set('America/Argentina/Mendoza');
            $fechaDesde = $_POST['fechaDesde'];
            $fechaHasta = $_POST['fechaHasta'];
            
            //$fechaHasta = date("Y-m-d H:i:s", strtotime($DateF));

            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            
            $nombreUsuario = $_SESSION['usuario'];  
            //busco el usuario
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUsuario = $usuario->idUsuario;
            /*comenzar a generar estadisticas
            Estados idEstadoTurno=
                                    1: Creado
                                    2: Llamado
                                    3: Atendido
                                    4: Ausente
                                    5: Derivado*/
            
            $turno=new Turno();
            $contarTurnosLlamados=$turno->ContarTurnosUsuario($idUsuario,2,$fechaDesde,$fechaHasta);
            $llamados = $contarTurnosLlamados->contarTurnos;

            $contarTurnosAtendidos=$turno->ContarTurnosUsuario($idUsuario,3,$fechaDesde,$fechaHasta);
            $atendidos = $contarTurnosAtendidos->contarTurnos;

            $contarTurnosAusentes=$turno->ContarTurnosUsuario($idUsuario,4,$fechaDesde,$fechaHasta);
            $ausentes = $contarTurnosAusentes->contarTurnos;

            $contarTurnosDerivados=$turno->ContarTurnosUsuario($idUsuario,5,$fechaDesde,$fechaHasta);
            $derivados = $contarTurnosDerivados->contarTurnos;

            $contarTurnosPerfil=$turno->ContarTurnosPerfil(1,$fechaDesde,$fechaHasta);
            $perfil = $contarTurnosPerfil->contarTurnos;
         // TENGO QUE AGREGAR MANEJO DE ERRORES COMO POR EJEMPLO LA DIVISION POR CERO -
            $pjeAusentes= ($ausentes*100)/$llamados;
            $pjeLlamados= ($llamados*100)/$llamados;
            $pjeAtendidos= ($atendidos*100)/$llamados;
            $pjeDerivados= ($derivados*100)/$llamados;
            $pjePerfil = ($llamados*100)/$perfil;
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/estadisticas/estadisticasUsuario.php";                   
            require_once "view/dash/footerDash.php";                            
        }

/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE RESERVAS
--------------------------------------------------------------------------------------------------------------*/


        public function GestionarReservas(){    
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            $usuarioPerfil = new UsuarioPerfil();
            $usuarioPerfil = $usuarioPerfil ->getPerfilUsuarioPorIdUsuario($usuario->idUsuario);
            $reserva = new Reserva();
            $datosReserva = $reserva->ConsultarReservasClientePorEstado(1,$usuarioPerfil->idPerfil);//1 para las reservas creadas
            require_once "view/dash/sidebarMenu.php";            
            require_once "view/dash/reservas/gestionarReservas.php";                   
            require_once "view/dash/footerDash.php";      
        }
        public function ConfirmarReservaTurno(){    
            $idReserva = $_POST['idReserva'];
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            $claseUser=new Usuario();
            $usuario = $claseUser->getUsuarioPorNombre($_SESSION['usuario']);
            $reserva = new Reserva();
            $reserva = $reserva->GetReservaPorId($idReserva);                        
            $turno = new Turno();
            $turno->setIdOperacion($reserva->idOperacion);
            $turno->setIdSector($reserva->idSector);
            //$turno->setNombreTurno($nomT)
            //$turno->setIdTurno($idTur)            
            $turno->setComentario($reserva->comentarioReserva);
            $turno->setIdCliente($reserva->idCliente);
            $idTurno = $turno->InsertarTurno($turno);
            $turnoHistorial = new TurnoHistorial();
            $turnoHistorial = $turnoHistorial->InsertarTurnoHistorial($idTurno,1);//1 creado en turno historial 
            #busca id res hist para actualizarlo 
            $reservaHistorial = new ReservaHistorial();
            $idUsuario = $usuario->idUsuario;
            $reservaHistorial->ActualizarEstadoReservaConUsuario($idReserva,2,$idUsuario);
            $reservaTurno = new ReservaTurno();
            $reservaTurno->CrearReservaTurno($idReserva,$idTurno);
            $reservaHistorial->CierraEstadoReserva($idReserva);
            $reserva = new Reserva();
            $datosReserva = $reserva->ConsultarReservasClientePorEstado(1);//visualiza las reservas creadas
            $msg='Se ha generado el turno exitosamente!';                       
            
            $imprimir = $turno->TurnoPorId($idTurno);
            //include "view/imprimir.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/reservas/gestionarReservas.php";                   
            require_once "view/dash/footerDash.php";      
        }
        
/* ---------------------------------------------------------------------------------------------------------------
                    GESTION DE -
--------------------------------------------------------------------------------------------------------------*/

=======
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f




<<<<<<< HEAD
}
=======
    }
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f

?>