<?php 

    class Turno{

        private $pdo;
        private $idTurno;
        private $prioridad;
        private $comentario;
        private $idSector;


        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }

        //Getters
         
        public function getIdTurno(){
            return $this->idTurno;
        }
        public function getPrioridad() {
            return $this->prioridad;
        }
        public function getComentario(){
            return $this->comentario;
        }
        public function getIdSector(){
            return $this->idSector;
        }
        //Setters
        public function setIdSector($idS){
            $this->idSector=$idS;
        }
        public function setIdTurno($idTur){
            $this->idTuno=$idTur;
        }
        public function setPrioridad($pri){
            $this->prioridad=$pri;
        }
        public function setComentario($com){
            $this->comentario=$com;
        }

        public function TurnoSinBaja(){
            try{
                $consulta=$this->pdo->prepare("SELECT SUM(`idTurno`)AS TurnoSinBaja FROM TURNO");
                
                $consulta->execute();
                echo("TurnosinBaja");
                return $consulta->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function ListarTurnosCreados(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM TURNO;");
                
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }


        public function Insertar(Turno $t){
            try{
                $consulta="INSERT INTO turno(idSector) VALUES(?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $t->getIdSector(),
                        ));/*
                $ultimoId = "SELECT idTurno FROM turno ORDER BY idTurno DESC LIMIT 1";
                $ultimoId->execute();

                $thcreate=new TurnoHistorial();
                
                $thcreate->setIdTurno($ultimoId);
                $thcreate->setIdEstadoTurno(1);
                                    */
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }


?>