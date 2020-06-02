<?php 

    class Cliente{

        private $pdo;
        private $idCliente;
        private $dniCliente;
        private $razonSocialCliente;
        private $cuitCliente;
        private $cuilCliente;
        private $nombreCliente;
        private $apellidoCliente;        
        private $mailCliente;
        private $telefono1Cliente;
        private $telefono2Cliente;
        private $comentarioCliente;

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        
        public function getIdCliente() {
            return $this->idCliente;
        }
        public function getDniCliente() {
            return $this->dniCliente;
        }
        public function getRazonSocialCliente() {
            return $this->razonSocialCliente;
        }
        public function getCuitCliente() {
            return $this->cuitCliente;
        }        
        public function getCuilCliente() {
            return $this->cuilCliente;
        } 
        public function getNombreCliente() {
            return $this->nombreCliente;
        }
        public function getApellidoCliente() {
            return $this->apellidoCliente;
        }
        public function getMailCliente() {
            return $this->mailCliente;
        }
        public function getTelefono1Cliente() {
            return $this->telefono1Cliente;
        }
        public function getTelefono2Cliente() {
            return $this->telefono2Cliente;
        }
        public function getComentarioCliente() {
            return $this->comentarioCliente;;
        }

         //Setters
       
        public function setIdCliente($idCli){
            $this->idCliente=$idCli;
        }
        public function setDniCliente($dni){
            $this->dniCliente=$dni;
        }
        public function setRazonSocialCliente($rsCli){
            $this->razonSocialCliente=$rsCli;
        }
        public function setCuitCliente($cuitCli){
            $this->cuitCliente=$cuitCli;
        }
        public function setCuilCliente($cuilCli){
            $this->cuilCliente=$cuilCli;
        }
        public function setNombreCliente($nombreCli){
            $this->nombreCliente=$nombreCli;
        }
        public function setApellidoCliente($apellidoCli){
            $this->apellidoCliente=$apellidoCli;
        }
        public function setMailCliente($mailCli){
            $this->mailCliente=$mailCli;
        }
        public function setTelefono1Cliente($telefono1Cli){
            $this->telefono1Cliente=$telefono1Cli;
        }
        public function setTelefono2Cliente($telefono2Cli){
            $this->telefono2Cliente=$telefono2Cli;
        }
        public function setComentarioCliente($comentCli){
            $this->comentarioCliente=$comentCli;
        }


        //Metodos
        


        public function InsertarDniClienteNuevo($dniCli){
            try{

                $consulta=$this->pdo->prepare("INSERT INTO `cliente` (`dniCliente`) VALUES ($dniCli);");

                $consulta->execute();
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function ActualizarCliente(Cliente $cli){
            try{
                
                $idCli = $cli->getIdCliente();
                $dniCli = $cli->getDniCliente();
                $rsCli = $cli->getRazonSocialCliente();
                $cuitCli = $cli->getCuitCliente();                                            
                $nomCli = $cli->getNombreCliente();
                $apeCli = $cli->getApellidoCliente();
                $cuilCli = $cli->getCuilCliente();                                            
                $mailCli = $cli->getMailCliente();
                $tel1Cli = $cli->getTelefono1Cliente();
                $tel2Cli = $cli->getTelefono2Cliente();      
                $comentarioCliente = $cli->getComentarioCliente();
                
                                
                $update=$this->pdo->prepare("UPDATE `cliente` SET 
                                        `cliente`.`dniCliente` = $dniCli,
                                        `cliente`.`razonSocialCliente` = '$rsCli', 
                                        `cliente`.`cuitCliente` = '$cuitCli',  
                                        `cliente`.`nombreCliente`='$nomCli',
                                        `cliente`.`apellidoCliente`='$apeCli',
                                        `cliente`.`mailCliente`='$mailCli',
                                        `cliente`.`telefono1Cliente`='$tel1Cli',
                                        `cliente`.`telefono2Cliente`='$tel2Cli',
                                        `cliente`.`comentarioCliente`='$comentarioCliente'
                                            WHERE `cliente`.`idcliente`= $idCli;");

                $update->execute();
                


            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------
        public function ConsultarCliente($dniCli){
            try{

                $consulta=$this->pdo->prepare("SELECT * FROM `cliente` 
                                            WHERE `cliente`.`dniCliente` = $dniCli LIMIT 1;");            
            
                $consulta->execute();                

                return $consulta->fetch(PDO::FETCH_OBJ);
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------

        public function InsertarClienteNuevo(Cliente $cli){
            try{                            
                $consulta="INSERT INTO cliente(idCliente,dniCliente,razonSocialCliente,cuitCliente,cuilCliente,nombreCliente,apellidoCliente,mailCliente,telefono1Cliente,telefono2Cliente,comentarioCliente) VALUES(?,?,?,?,?,?,?,?,?,?,?);";                
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $cli->getIdCliente(),
                            $cli->getDniCliente(),
                            $cli->getRazonSocialCliente(),
                            $cli->getCuitCliente(),
                            $cli->getCuilCliente(),
                            $cli->getNombreCliente(),
                            $cli->getApellidoCliente(),
                            $cli->getMailCliente(),
                            $cli->getTelefono1Cliente(),
                            $cli->getTelefono2Cliente(),
                            $cli->getComentarioCliente(),
                        ));                          
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------
        public function InsertarRetornarCliente(Cliente $cli){
            try{    
                $dniCli = $cli->getDniCliente();                        
                $consulta="INSERT INTO cliente(idCliente,dniCliente,razonSocialCliente,cuitCliente,cuilCliente,nombreCliente,apellidoCliente,mailCliente,telefono1Cliente,telefono2Cliente,comentarioCliente) VALUES(?,?,?,?,?,?,?,?,?,?,?);";                
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $cli->getIdCliente(),
                            $dniCli,
                            $cli->getRazonSocialCliente(),
                            $cli->getCuitCliente(),
                            $cli->getCuilCliente(),
                            $cli->getNombreCliente(),
                            $cli->getApellidoCliente(),
                            $cli->getMailCliente(),
                            $cli->getTelefono1Cliente(),
                            $cli->getTelefono2Cliente(),
                            $cli->getComentarioCliente(),
                        ));   
                
                $consultac=$this->pdo->prepare("SELECT * FROM `cliente` WHERE `cliente`.`dniCliente` = $dniCli LIMIT 1;");            
                $consultac->execute();                   
                return $consultac->fetch(PDO::FETCH_OBJ);
                        
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------

    }


?>