<?php 

    class Turno{

        private $pdo;
        private $idTurno;
        private $nombreTurno;
        private $prioridad;
        private $comentario;
        private $idOperacion;
        private $idSector;
        private $dniCliente;


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
        public function getDniCliente(){
            return $this->dniCliente;
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
        public function setDniCliente($dni){
            $this->dniCliente=$dni;
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
                //numero de turnos por sector
                $idSector = $t->getIdSector();

                $sqlDeHoy = "SELECT COUNT(*) AS total FROM `turno` 
                                INNER JOIN `turnohistorial` ON `turno`.`idTurno`=`turnohistorial`.`idTurno` 
                                    WHERE `turno`.`idSector` = $idSector
                                        AND  `turnohistorial`.`fechaAlta`>= CAST((NOW()) AS DATE) 
                                            AND `turnohistorial`.`fechaAlta` < CAST((NOW() + INTERVAL 1 DAY) AS DATE);";
                $turnosDeHoy=$this->pdo->prepare($sqlDeHoy);
                $turnosDeHoy->execute();
                $cant = $turnosDeHoy->fetch(PDO::FETCH_ASSOC);


                $consulta="INSERT INTO turno(idOperacion,idSector,nombreTurno,dniCliente) VALUES(?,?,?,?);";
                //$consulta="INSERT INTO turno(idOperacion,idSector) VALUES(?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $t->getIdOperacion(),
                            $t->getIdSector(),
                            $cant['total'],
                            $t->getDniCliente(),
                        ));
              

                $ultimoId=$this->pdo->prepare("SELECT idTurno FROM turno ORDER BY idTurno DESC LIMIT 1;");
                $ultimoId->execute();

                if ($ultimoId) {
                    $uid = intval($ultimoId->fetchColumn());                   
                }               
                $ultimoId->closeCursor();
                return ($uid);
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }



//-----------------------------------------------------------------------------------------------------------------------
        public function LlamarTurno($nombreUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `turno` 
                INNER JOIN `turnohistorial` ON `turno`.`idTurno`=`turnohistorial`.`idTurno`
                    INNER JOIN `operacion` ON `operacion`.`idOperacion` = `turno`.`idOperacion`
                        INNER JOIN `operacionperfil` ON `operacion`.`idOperacion`=`operacionperfil`.`idOperacion`
                            INNER JOIN `usuario` ON `usuario`.`nombreUsuario`= '$nombreUsuario'
                                INNER JOIN `cliente` ON `cliente`.`dniCliente`= `turno`.`dniCliente`
                                    WHERE `operacionperfil`.`idPerfil`=`usuario`.`idPerfil`   AND `turnohistorial`.`idEstadoTurno`=1  AND `turnohistorial`.`fechaBaja` IS NULL
                                        AND  `turnohistorial`.`fechaAlta`>= CAST((NOW()) AS DATE) 
                                            AND `turnohistorial`.`fechaAlta`  < CAST((NOW() + INTERVAL 1 DAY) AS DATE) LIMIT 1;");
                
                $consulta->execute();
                return $consulta->fetch(PDO::FETCH_OBJ);
                
                //return "hola";
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function InsertarBox($idTur, $nroBox){
            try{
                $consulta=$this->pdo->prepare("UPDATE `turno`
                                                SET `turno`.`box` = $nroBox
                                                 WHERE `turno`.`idTurno`= $idTur;");
                
                $consulta->execute();
               
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
// -----------------------------------------------------------------------------------------------------------------------------

public function TurnoActual($idTur){
    try{
        $consulta=$this->pdo->prepare("SELECT * FROM `turno` 
        INNER JOIN `cliente` ON `cliente`.`dniCliente`=`turno`.`dniCliente`        
        WHERE `turno`.`idTurno`=$idTur AND `turno`.`box` IS NOT NULL
        ;");
        
        $consulta->execute();    

        return $consulta->fetch(PDO::FETCH_OBJ);
    
    }catch(Exception $e){
        die($e->getMessage());
    }
}
// -----------------------------------------------------------------------------------------------------------------------------

public function ReLlamarTurno($idTur){
    try{
        $consulta=$this->pdo->prepare("SELECT * FROM `turno` 
        INNER JOIN `cliente` ON `cliente`.`dniCliente`=`turno`.`dniCliente`        
        WHERE `turno`.`idTurno`=$idTur AND `turno`.`box` IS NOT NULL
        ;");
        
        $consulta->execute();


        $update=$this->pdo->prepare("UPDATE `turno`
                                SET `turno`.`rellamado` = TRUE
                                    WHERE `turno`.`idTurno`= $idTur;");

        $update->execute();


        return $consulta->fetch(PDO::FETCH_OBJ);
        
        //return "hola";
    }catch(Exception $e){
        die($e->getMessage());
    }
}


// -----------------------------------------------------------------------------------------------------------------------------


public function DejarDeLlamar($idTur){
    try{        
        $update=$this->pdo->prepare("UPDATE `turno`
                                SET `turno`.`rellamado` = FALSE
                                    WHERE `turno`.`idTurno`= $idTur;");
        $update->execute();
        //return $consulta->fetch(PDO::FETCH_OBJ);

    }catch(Exception $e){
        die($e->getMessage());
    }
}


// -----------------------------------------------------------------------------------------------------------------------------

public function ListarTurnosSector(){
    try{
        $consulta=$this->pdo->prepare("SELECT * FROM `turno` 
        INNER JOIN `turnohistorial` ON `turno`.`idTurno`=`turnohistorial`.`idTurno`
        INNER JOIN `operacion` ON `operacion`.`idOperacion` = `turno`.`idOperacion`
        INNER JOIN `sector` ON `sector`.`idSector`=`turno`.`idSector`
        INNER JOIN `operacionperfil` ON `operacion`.`idOperacion`=`operacionperfil`.`idOperacion`
        INNER JOIN `usuario` ON `usuario`.`nombreUsuario`='venta'
        WHERE `operacionperfil`.`idPerfil`=`usuario`.`idPerfil` 
            AND `turnohistorial`.`idEstadoTurno`=1 
                AND `turnohistorial`.`fechaBaja` IS NULL
        AND  `turnohistorial`.`fechaAlta`>= CAST((NOW()) AS DATE) 
        AND `turnohistorial`.`fechaAlta`  < CAST((NOW() + INTERVAL 1 DAY) AS DATE);
        
        ");
        
        $consulta->execute();
        
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMenssage());
    }
}


    }


?>