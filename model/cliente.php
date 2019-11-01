<?php 

    class Cliente{

        private $pdo;
        private $dniCliente;
        private $idCliente;
        private $nombreCliente;
        private $apellidoCliente;
        private $mailCliente;
        private $telefono1Cliente;
        private $telefono2Cliente;


        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getDniCliente() {
            return $this->dniCliente;
        }
        public function getIdCliente() {
            return $this->idCliente;
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


         //Setters
        public function setDniCliente($dni){
            $this->dniCliente=$dni;
        }
        public function setIdCliente($idCli){
            $this->idCliente=$idCli;
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
                $nomCli = $cli->getNombreCliente();
                $apeCli = $cli->getApellidoCliente();
                $mailCli = $cli->getMailCliente();
                $tel1Cli = $cli->getTelefono1Cliente();
                $tel2Cli = $cli->getTelefono2Cliente();      
                $dniCli = $cli->getDniCliente();                                            
                                
                $update=$this->pdo->prepare("UPDATE `cliente` SET 
                                        `cliente`.`dniCliente` = $dniCli, 
                                        `cliente`.`nombreCliente`='$nomCli',
                                        `cliente`.`apellidoCliente`='$apeCli',
                                        `cliente`.`mailCliente`='$mailCli',
                                        `cliente`.`telefono1Cliente`='$tel1Cli',
                                        `cliente`.`telefono2Cliente`='$tel2Cli'
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