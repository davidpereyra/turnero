<?php
require_once "model/turno.php";
require_once "model/turnohistorial.php";
require_once "model/operacion.php";
require_once "model/sector.php";
require_once "model/parametros.php";
require_once "model/turnohistorial.php";
require_once "model/cliente.php";
require_once "model/reserva.php";
require_once "model/reservahistorial.php";

class TurnosWebControlador{
    private $modelo;    
    public function __CONSTRUCT(){
        $this->modelo=new Reserva();        
    }
    public function Inicio(){      
        
    }
    public function SolicitarTurnoRemoto(){        
        $sector = new Sector();
        $sectores = $sector->GetSectoresWeb();
        $op = new Operacion();
        $operaciones = $op->ListarOperacionesTurnosWeb();
        date_default_timezone_set('America/Argentina/Mendoza');
        $fechaActual = date('d-m-Y');
        $param = new Parametros();        
        $horario = $param->ObtenerRangoHabil();
        #for que verifique para el dia habil $diaHabil los horarios
        $th = new TurnoHistorial();
        //formato $dateNacimiento = date("Y-m-d", strtotime($fechaNacimiento));
        $fechaActual = date("Y-m-d", strtotime($fechaActual));
        $arregloDiasValidos = array();
        $total = array();
        for ($i=0; $i < 5; $i++) { 
            $arregloDiasValidos[] =date("d-m-Y",strtotime($param->SumarDiasHabiles($fechaActual,$i)));           
        }       
        require_once "view/headturno.php";
        require_once "view/turnosweb/index.php";
        require_once "view/footerturno.php";
    }

    public function GuardarTurnoRemoto(){    
        require_once "view/headturno.php";            
        //datos peticion cliente
        $nombreCliente = $_POST['nombre'];
        $apellidoCliente = $_POST['apellido'];
        $dniCliente = $_POST['dni'];
        $emailCliente = $_POST['email'];
        $telefonoCliente = $_POST['telefono'];
        $nombreSector = $_POST['sector'];
        //datos peticion turno
        $nombreOperacion = $_POST['operacion'];
        $fechaReserva = $_POST['fecha'];
        $horaReserva = $_POST['hora'];
        $comentarioReserva = $_POST['comentario'];
        //seteo datos a cliente
        $cliente = new Cliente();
        $cliente->setDniCliente($dniCliente);
        $cliente->setNombreCliente($nombreCliente);
        $cliente->setApellidoCliente($apellidoCliente);
        $cliente->setMailCliente($emailCliente);
        $cliente->setTelefono1Cliente($telefonoCliente);
        $cliente->setComentarioCliente(NULL);  
        //verifico si exite
        $clienteAntiguo = $cliente->ConsultarCliente($dniCliente);
        if (!empty($clienteAntiguo)) {
            $idCliente = $clienteAntiguo->idCliente;
            $rsCliente = $clienteAntiguo->razonSocialCliente;
            $cuitCliente = $clienteAntiguo->cuitCliente;
            $telefono2Cliente = $clienteAntiguo->telefono2Cliente;            
            $cliente->setIdCliente($idCliente);
            $cliente->setRazonSocialCliente($rsCliente);
            $cliente->setCuitCliente($cuitCliente);
            $cliente->setTelefono2Cliente($rsCliente);            
            #actualizo
            $cliente->ActualizarCliente($cliente);
            $cliente = $cliente->ConsultarCliente($dniCliente);
        }else {
            $cliente->setRazonSocialCliente(NULL);
            $cliente->setCuitCliente(NULL);
            $cliente->setTelefono2Cliente(NULL);
            //crea nuevo
            $cliente = $cliente->InsertarRetornarCliente($cliente);
            $idCliente = $cliente->idCliente;
        }
        //inicializo variables para que mail no de error
        $ultimoReservaId = '';
        $nombreDia = '';        
        //Verifico sector y operacion
        $sector = new Sector();
        $sectorExistente = $sector->BuscarSectorPorNombre($nombreSector);
        $idSector = $sectorExistente->idSector;
        $operacion = new Operacion();
        $operacionExistente = $operacion->BuscarOperacionPorNombre($nombreOperacion);
        $idOperacion = $operacionExistente->idOperacion;                                       
        //formato hora        
        $fechaReserva = date("Y-m-d", strtotime($fechaReserva));
        $horaReserva = date("H:i:s", strtotime($horaReserva));
        $rangoValido = date("H:i:s", strtotime('00:25:00'));        
        $fechaHora = $fechaReserva.' '.$horaReserva;
        //Busco si alguien reservo al mismo horario por las dudas        
        #$turnoHistorial = new TurnoHistorial(); 
        #$reservadoIntervalo = $turnoHistorial->TurnosExistentesEnIntervalo($fechaHora,$rangoValido,6);
        $reserva = new Reserva();
        $reservadoIntervalo = $reserva->ReservasExistentesEnIntervalo($fechaReserva,$horaReserva,$rangoValido,$idOperacion,1); //$diaHabil,$hora,$rango,$operacion,$idEstadoReserva
        if ($reservadoIntervalo) {
            $sector = new Sector();
            $sectores = $sector->GetSectoresWeb();
            $op = new Operacion();
            $operaciones = $op->ListarOperacionesTurnosWeb();
            date_default_timezone_set('America/Argentina/Mendoza');
            $fechaActual = date('d-m-Y');
            $motivo = '<br> <br>ATENCION! mientras usted completaba sus datos, alguien más reservó este día y horario, por favor <b>vuelva hasta el Paso 3</b> (Detalles del turno) y seleccione otro día/horario disponible.<br><br><br>';
            require_once "view/turnosweb/solicitudrechazada.php";

        }else {          
            //Seteo datos del turno                       
            #setIdReserva($IdReserved)
            $reserva->setIdCliente($idCliente);
            $reserva->setIdSector($idSector);
            $reserva->setIdOperacion($idOperacion);
            $reserva->setFechaReserva($fechaReserva);
            $reserva->setHoraReserva($horaReserva);
            $reserva->setComentarioReserva($comentarioReserva);
            $ultimoReservaId = $reserva->CrearReserva($reserva);

            date_default_timezone_set('America/Argentina/Mendoza');
            $fechaAltaReserva = date('Y-m-d');
            $horaAltaReserva = date('H:i:s');
            //$reservaHistorial->setIdReservaHistorial(NULL);
            $reservaHistorial = new ReservaHistorial();
            $reservaHistorial->setIdReserva($ultimoReservaId);
            $reservaHistorial->setIdEstadoReserva(1);//reservado
            $reservaHistorial->setIdUsuario(NULL);
            $reservaHistorial->setFechaAltaReserva($fechaAltaReserva);
            $reservaHistorial->setHoraAltaReserva($horaAltaReserva);
            $reservaHistorial->setFechaBajaReserva(NULL);
            $reservaHistorial->setHoraBajaReserva(NULL);
            $rh = $reservaHistorial->CrearReservaHistorial($reservaHistorial);

            //$reservaHistorial->InsertarTurnoHistorial($ultimoTurnoId,6);//Reservado_Web es (_,6)
            $parametros = new Parametros();
            $nombreDia = $parametros->get_nombre_dia($fechaReserva);            
            require_once "view/turnosweb/confirmacionTurno.php";      
            require_once "view/turnosweb/mail.php";      
        }
        require_once "view/footerturno.php";
        

    }



#---------------------------------------------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------------------------------------------



}
?>