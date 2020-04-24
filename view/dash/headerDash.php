<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashboard - Turnos</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap datatable CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
  <!--external css-->
  <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/lib/gritter/css/jquery.gritter.css" />


  <!--external css para tiempo y archivos -->
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-datetimepicker/css/datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-fileupload/bootstrap-fileupload.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-datepicker/css/datepicker.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-timepicker/compiled/timepicker.css" />
  



  <!-- Custom styles for this template -->
  
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script src="assets/lib/chart-master/Chart.js"></script>

  <!-- Push notification -->
  <script src="assets/push.js/bin/push.min.js"></script>

</head>


<body>
<?php

  session_start();
  if(!isset($_SESSION["usuario"])){
   
    header("location:?c=usuario&a=Login");	
    
  }else{
    $usuario=$_SESSION["usuario"];
    $permisosUsuario = $_SESSION['permisoUsuario'];
    setcookie("session_cookie","valor de la cookie");
  }  

