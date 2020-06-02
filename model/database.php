<?php 

class Database{
    const servidor="127.0.0.1";
    const usuariobd = "root";
<<<<<<< HEAD
    const pass = "Sistemas2875";
=======
    const pass = "";
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
    const nombrebd = "turnos";
	
    //define('DB_CHARSET', 'utf8');
    
    public static function Conectar(){
        try{
            $conexion = new PDO("mysql:host=".self::servidor.";dbname=".self::nombrebd.";charset=utf8",self::usuariobd,self::pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;
        }catch(PDOException $e){
            return "Fallo".$e->getMessage();
        }

    }

}


?>