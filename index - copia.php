<!DOCTYPE html>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <title></title>
</head>
<body>

<?php
    //var_dump($_GET['controlador']);
    require_once "model/database.php";


    if(!isset($_GET['c'])){
        require_once "controler/inicio.controlador.php";
        $controlador = new InicioControlador();
        call_user_func(array($controlador,"Inicio"));
    }else{
        $controlador= $_GET['c'];
        require_once "controler/$controlador.controlador.php";
        $controlador= ucwords($controlador)."Controlador";
        $controlador=new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
        call_user_func(array($controlador,$accion));
    }

?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>    