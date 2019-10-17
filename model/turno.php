<?php 

    class Turno{

        private $pdo;
        private $idTurno;
        private $nombreTurno;
        private $prioridad;
        private $comentario;
        private $idOperacion;
        private $idSector;


        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }

        //Getters
         
        public function getIdTurno(){
            return $this->idTurno;
        }
        public function getNombreTurno(){
            return $this->nombreTurno;
        }
        public function getPrioridad() {
            return $this->prioridad;
        }
        public function getComentario(){
            return $this->comentario;
        }
        public function getIdOperacion(){
            return $this->idOperacion;
        }
        public function getIdSector(){
            return $this->idSector;
        }
        //Setters
        public function setIdOperacion($idOp){
            $this->idOperacion=$idOp;
        }
        public function setIdSector($idS){
            $this->idSector=$idS;
        }
        public function setNombreTurno($nomT){
            $this->nombreTurno=$nomT;
        }
        public function setIdTurno($idTur){
            $this->nombreTurno=$idTur;
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

//-------------------------------------------------------------

// NO USADA PERO PUEDE SERVIR PARA TRAER EL ULTIMO TURNO EN OTRO MOMENTO
// ACTUALMENTE LO HACE DESDE INSERTAR(TURNO)
        public function UltimoIdTurno(){
            try{
               

                $consulta="SELECT MAX(IDTURNO) FROM TURNO;";
                $stmt = $this->pdo->prepare($consulta);
                $stmt->execute();
                $resultado =  $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;//aca tiene que retornar un entero.



            }catch(Exception $e){
                die($e->getMessage());
            }
        }
//-------------------------------------------------------------
        public function InsertarTurno(Turno $t){
            try{


                $sqlDeHoy = "SELECT COUNT(*) AS total FROM `turno` 
                                INNER JOIN `turnohistorial` ON `turno`.`idTurno`=`turnohistorial`.`idTurno` 
                                    WHERE `turno`.`idSector` = '4' 
                                        AND  `turnohistorial`.`fechaAlta`>= CAST((NOW()) AS DATE) 
                                            AND `turnohistorial`.`fechaAlta` < CAST((NOW() + INTERVAL 1 DAY) AS DATE);";
                $turnosDeHoy=$this->pdo->prepare($sqlDeHoy);
                $turnosDeHoy->execute();
                $cant = $turnosDeHoy->fetch(PDO::FETCH_ASSOC);


                $consulta="INSERT INTO turno(idOperacion,idSector,nombreTurno) VALUES(?,?,?);";
                //$consulta="INSERT INTO turno(idOperacion,idSector) VALUES(?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $t->getIdOperacion(),
                            $t->getIdSector(),
                            $cant['total'],
                        ));
              

                $ultimoId=$this->pdo->prepare("SELECT idTurno FROM turno ORDER BY idTurno DESC LIMIT 1;");
                $ultimoId->execute();

                if ($ultimoId) {
                    $uid = intval($ultimoId->fetchColumn());
                    echo gettype($uid) . " de insertar turno";
                    echo $uid;// Borrar - era para saber por cual id iba insertando
                   
                }               
                $ultimoId->closeCursor();
                return ($uid);
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }


?>