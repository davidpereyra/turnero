<?php 

    class Cliente{

        private $pdo;
        private $dniCliente;
        private $idTurno;
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
        public function getIdTurno() {
            return $this->idTurno;
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
        public function setIdTurno($idTur){
            $this->idTurno=$idTur;
        }
        public function setNombreCliente($nombreCli){
            $this->nombreCliente=$nombreCli;
        }
        public function setApellidoCliente($apellidoCli){
            $this->apellidoCliente=$apellidoCli;
        }
        public function setMailCliente($mailCli){
            $this->mailClie=$mailCli;
        }
        public function setTelefono1Cliente($telefono1Cli){
            $this->telefono1Cli=$telefono1Cli;
        }
        public function setTelefono2Cliente($telefono2Cli){
            $this->telefono2Cli=$telefono2Cli;
        }



        //Metodos

        public function InsertarDniCliente($dniCli){
            try{
                $consulta="INSERT INTO cliente(dniCliente) VALUES(:dniCli);";
                $stmt = $this->pdo->prepare($consulta);
//                $stmt->execute(array(":dniCli"=>intval($dniCli), ":idTur"=>$idTur));
                $stmt->execute(array(":dniCli"=>intval($dniCli)));

                $stmt->closeCursor();
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }





    }


?>