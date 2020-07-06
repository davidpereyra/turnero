<?php 

    class EstadoReserva{

        private $pdo;
        private $idEstadoReserva;
        private $nombreEstadoReserva;
        private $descripcionEstadoReserva;       

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters        
        public function getIdEstadoReserva() {
            return $this->idEstadoReserva;
        }
        public function getNombreEstadoReserva() {
            return $this->nombreEstadoReserva;
        }
        public function getDescripcionEstadoReserva() {
            return $this->razonSocialCliente;
        }
         //Setters       
        public function setIdEstadoReserva($idEdoRes){
            $this->idEstadoReserva=$idEdoRes;
        }
        public function setNombreEstadoReserva($nameReserva){
            $this->nombreEstadoReserva=$nameReserva;
        }
        public function setDescripcionEstadoReserva($descReserva){
            $this->descripcionEstadoReserva=$descReserva;
        }
        //Metodos
        
        public function Model(){
            try{
                $consulta=$this->pdo->prepare(";");
                $consulta->execute();
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------

    }


?>