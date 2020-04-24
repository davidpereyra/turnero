<?php 

    class Usuario{

        private $pdo;
        private $idUsuario;        
        private $nombreUsuario;
        private $passUsuario;
        private $nombreReal;
        private $apellidoReal;
        private $dniUsuario;
        private $correoUsuario;
        private $rolUsuario;
        private $online;
        private $nroPuesto;
        private $telefonoInterno;
        private $telefonoPersonal;
        private $telefonoEmergencia;        
        private $nombreContacto;
        private $direccionEmergencia;
        private $informacionAdicional;
        private $fechaNacimiento;
        private $imgUsuario;


        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        public function getNombreUsuario() {
            return $this->nombreUsuario;
        }
        public function getPassUsuario() {
            return $this->passUsuario;
        }
        public function getNombreReal() {
            return $this->nombreReal;
        }
        public function getApellidoReal() {
            return $this->apellidoReal;
        }
        public function getDniUsuario() {
            return $this->dniUsuario;
        }
        public function getCorreoUsuario() {
            return $this->correoUsuario;
        }
        public function getRolUsuario() {
            return $this->rolUsuario;
        }
        public function getOnline() {
            return $this->online;
        }
        public function getNroPuesto() {
            return $this->nroPuesto;
        }
        public function getTelefonoInterno() {
            return $this->telefonoInterno;
        }
        public function getTelefonoPersonal() {
            return $this->telefonoPersonal;;
        }
        public function getTelefonoEmergencia() {
            return $this->telefonoEmergencia;
        }
        public function getNombreContacto() {
            return $this->nombreContacto;
        }
        public function getDireccionEmergencia(){
            return $this->direccionEmergencia;   
        }
        public function getInformacionAdicional() {
            return $this->informacionAdicional;
        }
        public function getFechaNacimiento() {
            return $this->fechaNacimiento;
        }
        public function getImgUsuario() {
            return $this->imgUsuario;
        }

       
         //Setters
        public function setIdUsuario($idUser){
            $this->idUsuario=$idUser;
        }
        public function setNombreUsuario($nombreUser){
            $this->nombreUsuario=$nombreUser;
        }
        public function setPassUsuario($passUser){
            $this->passUsuario=$passUser;
        }
        public function setNombreReal($nombReal){
            $this->nombreReal=$nombReal;
        }
        public function setApellidoReal($apeReal){
            $this->apellidoReal=$apeReal;
        }
        public function setDniUsuario($dniUser){
            $this->dniUsuario=$dniUser;
        }
        public function setCorreoUsuario($correoUser){
            $this->correoUsuario=$correoUser;
        }
        public function setRolUsuario($rolUser){
            $this->rolUsuario=$rolUser;
        }
        public function setOnline($userOnline){
            $this->online=$userOnline;
        }
        public function setNroPuesto($userPuesto){
            $this->nroPuesto=$userPuesto;
        }
        public function setTelefonoInterno($telInterno){
            $this->telefonoInterno=$telInterno;
        }
        public function setTelefonoPersonal($telPersonal){
            $this->telefonoPersonal=$telPersonal;
        }
        public function setTelefonoEmergencia($telEmergencia){
            $this->telefonoEmergencia=$telEmergencia;
        }
        public function setNombreContacto($nameContacto){
            $this->nombreContacto=$nameContacto;
        }
        public function setDireccionEmergencia($dirEmergencia){
            $this->direccionEmergencia=$dirEmergencia;
        }
        public function setInformacionAdicional($infoAdicional){
            $this->informacionAdicional=$infoAdicional;
        }
        public function setFechaNacimiento($dateNacimiento){
            $this->fechaNacimiento=$dateNacimiento;
        }
        public function setImgUsuario($imgUser){
            $this->imgUsuario=$imgUser;
        }
        
        
        //Methods
        public function ValidarLogin($user, $pass, $puesto){
            try{ 

                $sentenciaPuesto="SELECT * FROM `usuario`
                                    WHERE `usuario`.`nroPuesto` = $puesto";
                $consultaPuesto = $this->pdo->prepare($sentenciaPuesto);
                $consultaPuesto->execute();
                $cantidadPuestosEncontrados = $consultaPuesto->rowCount();

                if(!$cantidadPuestosEncontrados){    

                    $consulta="SELECT * FROM `usuario` 
                                WHERE `usuario`.`nombreUsuario` = '$user'
                                AND `usuario`.`passUsuario` = '$pass' 
                                AND `usuario`.`online` = 0
                                AND `usuario`.`nroPuesto` IS NULL";
                    
                    $login = $this->pdo->prepare($consulta);
                    $login->execute();   
                    
                    $numero_registro=$login->rowCount();
                
                    if($numero_registro!=0){
                        session_start();//inicia sesion
                        //almacena usuario de la sesion
                        $_SESSION["usuario"]=$user;
                        $_SESSION["puesto"]=$puesto;
                       
                       
                        $valor = True;
                    }else{
                        $valor = False;
                    }     
                
                }
                return $valor;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

/* --------------------------------------------------------------------------------------- */

        public function VerificaPuesto($puesto){
            try{ 
                $userOnline=$this->pdo->prepare("SELECT * FROM `usuario` 
                                                    WHERE `usuario`.`nroPuesto` =$puesto");

                $userOnline->execute();
                return $userOnline->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


/* --------------------------------------------------------------------------------------- */

        public function UsuariosOnline(){
            try{ 
                $userOnline=$this->pdo->prepare("SELECT * FROM `usuario` 
                                                WHERE `usuario`.`online` = 1");

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
                                                SET `usuario`.`online` = 0, `usuario`.`nroPuesto` = NULL
                                                WHERE `usuario`.`nombreUsuario` = '$user'");

                $set_ofline->execute();
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


/* --------------------------------------------------------------------------------------- */

        public function OnlineOn($user,$puesto){
            try{ 
                $set_online=$this->pdo->prepare("UPDATE `usuario` 
                                                SET `usuario`.`online` = 1, `usuario`.`nroPuesto` = $puesto
                                                WHERE `usuario`.`nombreUsuario` = '$user'");

                $set_online->execute();
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
/* --------------------------------------------------------------------------------------- */

public function getUsuarioPorNombre($user_name){
    try{ 
        $get_user=$this->pdo->prepare("SELECT * FROM `usuario` 
                                        WHERE `usuario`.`nombreUsuario` = '$user_name';");

        $get_user->execute();

        return $get_user->fetch(PDO::FETCH_OBJ);
    
    }catch(Exception $e){
        die($e->getMessage());
    }
}
//---------------------------------------------------------------------------------------------------------------//
        public function ListarUsuariosActivos(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `usuario` 
                                                WHERE `usuario`.`online` = 1 
                                                AND `usuario`.`nroPuesto` IS NOT NULL");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }


//---------------------------------------------------------------------------------------------------------------//
    
//---------------------------------------------------------------------------------------------------------------//
        public function ListarUsuariosPaginados($iniciar,$operarios_por_pagina){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `usuario` 
                                                WHERE `usuario`.`online` = 1 
                                                AND `usuario`.`nroPuesto` IS NOT NULL                
                                                ORDER BY `usuario`.`idUsuario`
                                                LIMIT $iniciar,$operarios_por_pagina");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }


//---------------------------------------------------------------------------------------------------------------//
    public function ActualizarUsuario(Usuario $user){
        try{
            $idUser = $user->getIdUsuario();
            $nombreReal = $user->getNombreReal();
            $apellidoReal = $user->getApellidoReal();
            $dniUsuario = $user->getDniUsuario();
            $correoUsuario = $user->getCorreoUsuario();                                            
            $rolUsuario = $user->getRolUsuario();
            $infoAdicional = $user->getInformacionAdicional();
            $telefonoInterno = $user->getTelefonoInterno();
            $telefonoPersonal = $user->getTelefonoPersonal();                                            
            $telefonoEmergencia = $user->getTelefonoEmergencia();
            $nombreContacto = $user->getNombreContacto();
            $direccionEmergencia = $user->getDireccionEmergencia();      
            $fechaNacimiento = $user->getFechaNacimiento();
            //$imgUsuario = $user->getImgUsuario();
                            
            $update=$this->pdo->prepare("UPDATE `usuario` SET
                                            `usuario`.`nombreReal` = '$nombreReal',
                                            `usuario`.`apellidoReal` = '$apellidoReal',
                                            `usuario`.`dniUsuario` = '$dniUsuario',
                                            `usuario`.`correoUsuario` = '$correoUsuario',
                                            `usuario`.`rolUsuario` = '$rolUsuario',
                                            `usuario`.`telefonoInterno` = '$telefonoInterno',
                                            `usuario`.`telefonoPersonal` = '$telefonoPersonal',
                                            `usuario`.`telefonoEmergencia` = '$telefonoEmergencia',
                                            `usuario`.`nombreContacto` = '$nombreContacto',
                                            `usuario`.`direccionEmergencia` = '$direccionEmergencia',
                                            `usuario`.`informacionAdicional` = '$infoAdicional',
                                            `usuario`.`fechaNacimiento` = '$fechaNacimiento'                                            
                                        WHERE `usuario`.`idUsuario` = $idUser;");

            $update->execute();            

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
//---------------------------------------------------------------------------------------------------------------//
        public function ActualizarImagenUsuario(Usuario $user){
            try{
                $idUser = $user->getIdUsuario();
                $imgUsuario = $user->getImgUsuario();
                                
                $update=$this->pdo->prepare("UPDATE `usuario` SET
                                                `usuario`.`imgUsuario` = '$imgUsuario'                                                                                        
                                            WHERE `usuario`.`idUsuario` = $idUser;");

                $update->execute();            

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

//------------------------------------------------------------------------------------------------
}


?>