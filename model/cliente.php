<?php 

    class Cliente{

        private $pdo;
        private $idCliente;
        private $dniCliente;
        private $razonSocialCliente;
        private $cuitCliente;
        private $nombreCliente;
        private $apellidoCliente;
        private $cuilCliente;
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
        public function getNombreCliente() {
            return $this->nombreCliente;
        }
        public function getApellidoCliente() {
            return $this->apellidoCliente;
        }
        public function getCuilCliente() {
            return $this->cuilCliente;
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
        public function setNombreCliente($nombreCli){
            $this->nombreCliente=$nombreCli;
        }
        public function setApellidoCliente($apellidoCli){
            $this->apellidoCliente=$apellidoCli;
        }
        public function setCuilCliente($cuilCli){
            $this->cuilCliente=$cuilCli;
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
        


        public function InsertarDniCliente($dniCli){
            try{

                $consulta=("SELECT DNICLIENTE FROM CLIENTE WHERE DNICLIENTE = $dniCli;");            
                $consultaExiste=$this->pdo->prepare($consulta);
                $consultaExiste->execute();
            
                


                if(!($consultaExiste->fetchColumn()) == $dniCli){  
                   
               
                    $consulta="INSERT INTO cliente(dniCliente) VALUES(:dniCli);";
                    $stmt = $this->pdo->prepare($consulta);
                  
                    $stmt->execute(array(":dniCli"=>intval($dniCli)));
                    $stmt->closeCursor();
                       
                }
                return intval($consultaExiste->fetchColumn());     
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function ActualizarDatos(Cliente $cli){
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
public function ConsultarId($dniCli){
    try{

        $consulta=$this->pdo->prepare("SELECT `cliente`.`idCliente` 
                                                FROM `cliente` 
                                                    WHERE `cliente`.`dniCliente` = $dniCli;");            
        $consulta->execute();

        if ($consulta) {
            $idCliente = intval($consulta->fetchColumn());                   
            }               
        $consulta->closeCursor();
       
        return $idCliente;    
       
    }catch(Exception $e){
        die($e->getMessage());
    }
}

// -----------------------------------------------------------------------------------------------------------------------------


    }


?>