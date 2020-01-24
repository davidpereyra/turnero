<?php
require_once "model/usuario.php";
require_once "model/turno.php";
require_once "model/turnohistorial.php";
require_once "model/cliente.php";
require_once "model/operacion.php";
require_once "model/operacionperfil.php";
require_once "model/perfil.php";




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
            //$sector = $_POST['selectSector'];
            $puesto = $_POST['selectPuesto'];               
            $valor = $claseUser->ValidarLogin($user, $pass, $puesto);            
            if ($valor){
                $claseUser->OnlineOn($user); 
                header("location:?c=usuario&a=InicioDash");	                
            }else{
                header("location:?c=usuario&a=Login");
            }
                        
        }


        public function InicioDash(){     
            $op=new Operacion();
            $t=new Turno();            
            $perfil = new Perfil();
            

           
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
            
            session_start();
            session_destroy();
            header("location:?c=usuario&a=Login");
        }

        public function Llamar(){
            $nombreUsuario = $_POST['nombreUsuario']; 
            $opNombre = $_POST['operacionNombre'];
           
            $turno=new Turno();
           

                if($opNombre == "Por orden"){
                    $siguiente= $turno->LlamarTurnoPorOrden($nombreUsuario);
                
                }else if ($opNombre == "Derivado"){
                    $siguiente= $turno->LlamarTurnoConPrioridad($nombreUsuario);
                }else{
                    $op = new OperacionPerfil();
                    $opPri = $op -> ConsultarPrioridad($nombreUsuario,$opNombre); 
                    $opPrioridad = $opPri->operacionPrioridad;             
                    $siguiente= $turno->LlamarTurnoOperacion($nombreUsuario, intval($opPrioridad));
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
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $turno->DejarDeLlamar($idTurno);
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){

                $claseUser=new Usuario();
                $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuarioLlamador->idUsuario;

                $turnohistorial=new TurnoHistorial();
                $turnohistorial->ActualizarEstadoAsociadoUsuario($idTurno,3,$idUser);//3 es el estado ATENDIDO
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash3.php"; 
                require_once "view/dash/sidebarderecho4.php";         
                require_once "view/dash/footerDash.php";  
            }else{           
                header("location:?c=usuario&a=InicioDash");	                  
            }
           
        }


        public function Ausente(){
            $nombreUsuario = $_POST['nombreUsuario'];    
            $idTurno = $_POST['idTurno'];           
            $turno=new Turno();
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){
                $turnohistorial=new TurnoHistorial();
                $claseUser=new Usuario();
                $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
                $idUser = $usuarioLlamador->idUsuario;
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
                
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash4.php"; 
                require_once "view/dash/sidebarderecho_vacio.php";         
                require_once "view/dash/footerDash.php";        
            }
           
        }

        public function DerivarPorOperacion(){   
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
            $usuarioLlamador = $claseUser->getUsuarioPorNombre($nombreUsuario);
            $idUser = $usuarioLlamador->idUsuario;
            $turnohistorial->ActualizarEstadoAsociadoUsuarioCierre($idTurnoActual,5,$idUser);//5 es el estado DERIVADO



            $idCli = $cliente->ConsultarId($dniCliente);          
            $operacion = new Operacion();
            $Sector = $operacion ->BuscarSector(intval($idOperacion));
            $idSector = $Sector->idSector;
            $prioridad = 1;


            



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
            
            $turnohistorial->CrearTurnoHistorial($uid,1);//creado es (_,1)
    
            //Busca turno recien creado para imprimir en ticket
    
            $imprimir = $t->TurnoPorId($uid);
            require_once "view/dash/headerDash.php";
            require_once "view/dash/head.php";
            require_once "view/dash/sidebarMenu.php";
            require_once "view/dash/contentdash5.php"; 
            require_once "view/dash/sidebarderecho_vacio.php";         
            require_once "view/dash/footerDash.php";   
        }
        


        public function ActualizarDatosCliente(){
           
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
            $comentCli = $_POST['comentarioCliente'];
            
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

            $c = $cli->ActualizarDatos($cli);
            
            
            $siguiente= $turno->TurnoActual($idTurno);            
            if($siguiente){                           
                require_once "view/dash/headerDash.php";
                require_once "view/dash/head.php";
                require_once "view/dash/sidebarMenu.php";
                require_once "view/dash/contentdash3.php"; 
                require_once "view/dash/sidebarderecho4.php";         
                require_once "view/dash/footerDash.php";  	                  
            }

            
        }





    }

?>