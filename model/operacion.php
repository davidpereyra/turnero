<?php 

    class Operacion{

        private $pdo;
        private $idOperacion;
        private $idSector;    
        private $nombreOperacion;
        private $nomenclaturaOperacion;         
        private $accionToten;
        private $accionTurnoWeb;
        private $accionDash;    
        private $menuDash;
        private $nombreAccion;
        private $idSubOperacion;
        private $iconoMenu;
        private $urlAccion;    

        public function __CONSTRUCT(){
            $this->pdo = Database::Conectar();
        }
        
         //Getters
        public function getIdOperacion() {
            return $this->idOperacion;
        }
        public function getIdSector() {
            return $this->idSector;
        }
        public function getNombreOperacion() {
            return $this->nombreOperacion;
        }
        public function getNomenclaturaOperacion() {
            return $this->nomenclaturaOperacion;
        }
        public function getAccionToten() {
            return $this->accionToten;
        }
        public function getAccionTurnoWeb() {
            return $this->accionTurnoWeb;
        }
        public function getAccionDash() {
            return $this->accionDash;
        }
        public function getMenuDash() {
            return $this->menuDash;
        }
        public function getNombreAccion() {
            return $this->nombreAccion;
        }
        public function getIdSubOperacion() {
            return $this->idSubOperacion;
        }
        public function getIconoMenu() {
            return $this->iconoMenu;
        }
        public function getUrlAccion() {
            return $this->urlAccion;
        }


         //Setters
        public function setIdOperacion($idOpe){
            $this->idOperacion=$idOp;
        }
        public function setIdSector($idSec){
            $this->idSector=$idSec;
        }
        public function setNombreOperacion($nombreOp){
            $this->nombreOperacion=$nombreOp;
        }
        public function setNomenclaturaOperacion($nomenclaturaOp){
            $this->nomenclaturaOperacion=$nomenclaturaOp;
        }
        public function setAccionToten($actionTotem) {
            $this->accionToten=$actionTotem;
        }
        public function setAccionTurnoWeb($actionWeb) {
            $this->accionTurnoWeb=$actionWeb;
        }
        public function setAccionDash($actionDash) {
            $this->accionDash=$actionDash;
        }
        public function setMenuDash($navDash) {
            $this->menuDash=$navDash;
        }
        public function setNombreAccion($nameAction) {
            $this->nombreAccion=$nameAction;
        }
        public function setIdSubOperacion($idSubOp) {
            $this->idSubOperacion=$idSubOp;
        }
        public function setIconoMenu($iconNav) {
            $this->iconoMenu=$iconNav;
        }
        public function setUrlAccion($urlAction) {
            $this->urlAccion=$urlAction;
        }

        //Metodos
        public function BuscarOperacionPorId($idOp){
            try{
               
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion` 
                                                WHERE `operacion`.`idOperacion` = $idOp;");
                $consulta->execute();
                
                return $consulta->fetch(PDO::FETCH_OBJ);
               
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

//// METODOS


        public function ListarOperacionesPerfil($idUsuario){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion`
                INNER JOIN `operacionperfil` ON `operacionperfil`.`idOperacion`=`operacion`.`idOperacion`
                INNER JOIN `perfil` ON `operacionperfil`.`idPerfil` = `perfil`.`idPerfil`
                INNER JOIN `usuarioperfil` ON `operacionperfil`.`idPerfil` = `usuarioperfil`.`idPerfil`
                INNER JOIN `usuario` ON `usuarioperfil`.`idUsuario` = `usuario`.`idUsuario`
                WHERE `usuario`.`idUsuario` = '$idUsuario'
                AND  `operacion`.`accionDash` = 1
                ORDER BY `operacionperfil`.`operacionPrioridad` DESC
                ");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
//---------------------------------------------------------------------------------------------------------------//
        public function ListarOperacionesPerfilesActivos(){ //lista las operaciones de los perfiles activos
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion`
                INNER JOIN `operacionperfil` ON `operacion`.`idOperacion`=`operacionperfil`.`idOperacion`
                INNER JOIN `perfil` ON `operacionperfil`.`idPerfil` = `perfil`.`idPerfil`
                INNER JOIN `usuarioperfil` ON `operacionperfil`.`idPerfil` = `usuarioperfil`.`idPerfil`
                INNER JOIN `usuario` ON `usuarioperfil`.`idUsuario` = `usuario`.`idUsuario`
                WHERE `usuario`.`online`=1 AND `operacion`.`nombreOperacion` != 'Por orden' 
                AND `operacion`.`nombreOperacion` != 'Derivado'
                GROUP BY `operacion`.`nombreOperacion` ASC");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
//---------------------------------------------------------------------------------------------------------------//
        public function ListarOperacionesPorSector($idSector){ //lista las operacion que se pueden ver en el totem
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion` 
                                                WHERE `operacion`.`idSector` = $idSector  
                                                AND `operacion`.`accionToten` IS TRUE
                                                ");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }


//---------------------------------------------------------------------------------------------------------------//
        public function ListarPermisosActivo($idSector){ //Lista permisos de SECTOR - no usado revision 2020.04.20
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion` 
                                                WHERE `operacion`.`idSector` = $idSector  
                                                AND `operacion`.`accionToten` IS TRUE");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }

//---------------------------------------------------------------------------------------------------------------//
        public function ListarPermisosGestionUsuario($idUsuario){ //Lista permisos de SECTOR - no usado revision 2020.04.20
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `operacion`
                    INNER JOIN `operacionperfil` ON `operacion`.`idOperacion` = `operacionperfil`.`idOperacion`
                    INNER JOIN `perfil` ON `operacionperfil`.`idPerfil` = `perfil`.`idPerfil`
                    INNER JOIN `usuarioperfil` ON `perfil`.`idPerfil` = `usuarioperfil`.`idPerfil`
                    INNER JOIN `usuario` ON `usuarioperfil`.`idUsuario` = `usuario`.`idUsuario`
                    WHERE `usuario`.`idUsuario` = $idUsuario
                    AND `operacion`.`menuDash` IS TRUE
                    ORDER BY `operacion`.`idOperacion` ASC
                                            ");
                    
                $consulta->execute();
                    
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
//---------------------------------------------------------------------------------------------------------------//
        public function ListarOperacionesTurnosWeb(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM `turnos`.`operacion`
                                                    WHERE `operacion`.`accionTurnoWeb` = 1
                                                    ORDER BY `operacion`.`idSector` ASC
                                                                            ");                    
                $consulta->execute();                    
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMenssage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
        public function BuscarOperacionPorNombre($nombreOperacion){
            try{
                $consulta=$this->pdo->prepare("SELECT *FROM `operacion`
                            WHERE `operacion`.`nombreOperacion` = '$nombreOperacion';");
                
                $consulta->execute();                
                return $consulta->fetch(PDO::FETCH_OBJ);
                $stmt->closeCursor();
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
/* ----------------------------------------------------------------------------------------------------------------------*/
   

    }


?>