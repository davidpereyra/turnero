<?php 

class Database{
    const servidor="localhost";
    const usuariobd = "admin";
    const pass = "Adm1n_Tur";
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