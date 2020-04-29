<?php
require_once "model/turno.php";
require_once "model/turnohistorial.php";
require_once "model/cliente.php";
require_once "model/sector.php";
require_once "model/operacion.php";
require_once "model/usuario.php";

class InicioControlador{
    private $modelo;
    public $thcreate;
    public function __CONSTRUCT(){
        $this->modelo=new Turno();
        //$this->modelo=new TurnoHistorial();
    }
    public function Inicio(){       
        require_once "view/menu.html";
    }

    public function selectTurno(){        
        require_once "view/turno/index.php";
        require_once "view/footerturno.php";
    }
    public function SeleccionarPrioridad(){
        
        $dnicli = intval($_POST['dni']);
        $cliente=new Cliente();
        
       
        $clienteValidado = $cliente->ConsultarCliente($dnicli);
        //$dniValidado=$clienteValidado->dniCliente;
       
        if(!$clienteValidado){
            $cliente->InsertarDniClienteNuevo($dnicli);
            $clienteValidado = $cliente->ConsultarCliente($dnicli);
           
        }
        $nombreCliente = $clienteValidado->nombreCliente;
        $apellidoCliente = $clienteValidado->apellidoCliente;
        $dniValidado = $clienteValidado->dniCliente;

        require_once "view/turno/seleccionar_prioridad.php";        
        require_once "view/footerturno.php";
    }
    public function SeleccionarSector(){
        $priDiscapacidad = $_POST['priDiscapacidad'];
        $dniValidado = intval($_POST['dniValidado']);
        $sector = new Sector();
        $sectoresActivos = $sector->GetSectores();
        
        require_once "view/turno/seleccionar_sector.php";        
        require_once "view/footerturno.php";
    }

    public function SeleccionarOperacion(){
        $operacion = new Operacion();

        $idSector = $_POST['idSector']; 
        $dniValidado = intval($_POST['dniValidado']);
                //discapacidad
        $priDiscapacidad = $_POST['priDiscapacidad'];;
        
        if($idSector == 7){//7 es atencion personalizada
            $usuario=new Usuario();
            $operarioActivo = $usuario -> ListarUsuariosActivos();

            //PAGINACION
//PAGINACION A LLEVAR A PARAMETROS
$operarios_por_pagina = 12;
//contar filas
$total_operarios = count($operarioActivo);
$cantidad_de_paginas = $total_operarios/$operarios_por_pagina;
$cantidad_de_paginas = ceil($cantidad_de_paginas);
if (isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    if ($pagina<1 || $pagina >$cantidad_de_paginas) {
        $pagina = 1;
    }
}else{
    $pagina = 1;
}
$iniciar = ($pagina-1) * $operarios_por_pagina;
$operarioPagina = $usuario -> ListarUsuariosPaginados($iniciar,$operarios_por_pagina);
          //FIN PAGINACION

            require_once "view/turno/seleccionar_operario.php";
        }else{
            $operacionSector = $operacion -> ListarOperacionesPorSector($idSector);
            require_once "view/turno/seleccionar_operacion.php";
        }
                
        require_once "view/footerturno.php";
    }
    

    public function GenerarTurno(){
        $cliente = new Cliente();
        $idOperacion = $_POST['idOperacion']; 
        $idSector = $_POST['idSector']; 
        $dniCli = intval($_POST['dniValidado']);
        $idUsuario = intval($_POST['idUsuario']);        
        $prioridad = $_POST['priDiscapacidad']; 
        $clienteValidado = $cliente->ConsultarCliente($dniCli);
        $idCli = $clienteValidado->idCliente;
        
        //Turno
        $t=new Turno();
        $t->setIdTurno($_POST['idTurno']);
        $t->setIdOperacion($idOperacion);
        $t->setIdSector($idSector);
        $t->setIdCliente($idCli);
        $t->setPrioridad($prioridad);
               
        $uid = $this->modelo->InsertarTurno($t); //$uid es el idTurno
        
        //turno historial
        $thcreate=new TurnoHistorial();
        
        if($idUsuario){
            $thcreate->CrearTurnoHistorialUsuario($uid,1,$idUsuario);//creado es (_,1)
        }else{
            $thcreate->CrearTurnoHistorial($uid,1);//creado es (_,1)
        }

        //Busca turno recien creado para imprimir en ticket

        $imprimir = $t->TurnoPorId($uid);

        //include "view/imprimir.php";
        
        header("location:../turnero/?c=inicio&a=selectTurno");
        
    }




    
}
?>