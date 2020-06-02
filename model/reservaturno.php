<?php 

    class ReservaTurno{

        private $pdo;
        private $idReservaTurno;
        private $idReserva;    
        private $idTurno;  
        
        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdReservaTurno() {
            return $this->idReservaTurno;
        }
        public function getIdReserva() {
            return $this->idReserva;
        }
        public function getIdTurno() {
            return $this->idTurno;
        }
        
         //Setters
        
        public function setIdReservaTurno($idResTurno) {
            $this->idReservaTurno=$idResTurno;
        }
        public function setIdReserva($IdReserved){
            $this->idReserva=$IdReserved;
        }
        public function setIdTurno($idTur) {
            $this->idTurno=$idTur;
        }
//Metodos
        public function modelo(){
            try{
                $consulta=$this->pdo->prepare(";");                
                $consulta->execute();                
                return $consulta->fetch(PDO::FETCH_OBJ);
            
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


//-----------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------
// inserta relacion entre reserva y turno
public function CrearReservaTurno($idReserva,$idTurno){ 
    try{      
        $consulta="INSERT INTO reservaturno(idReserva, idTurno) VALUES (?,?);";
        $this->pdo->prepare($consulta) 
        ->execute(array(
            $idReserva,
            $idTurno,
        ));                               
    }
    catch(Exception $e){
        die($e->getMessage());
    }
}
//-----------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------



//-----------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------------------------------------

}

?>