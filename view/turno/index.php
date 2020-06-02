<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">  
<head>
<meta charset='utf-8'>

    <meta name='viewport' content='width=device-width initial-scale=1'>
    <meta name='mobile-web-app-capable' content='yes'>
    <link rel='stylesheet' href='assets/css/style.css'>
    <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/css/login.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    </head>
<body>
<header>
  
  <div class="navbar bg-dark shadow-sm"> <!--clases navbar-dark bg-dark shadow-sm-->
    <div class="container d-flex justify-content-between ">
   
      <img src="assets/img/isologo_cocucci.png"  width="" height="80px">
   
      <!--<a href="#" class="navbar-brand d-flex align-items-center">
        
        <strong>Cocucci</strong>
      </a>-->
    

     
    </div>
  </div>
</header>

<div class="container">
    <script>
=======
<script>
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
      function insert(num){
        document.form.dni.value = document.form.dni.value + num
      }
      function clean(){
        document.form.dni.value = "";
      }
      function back(){
        var exp = document.form.dni.value;
        document.form.dni.value = exp.substring(0,exp.length-1);
      }
      function validar() {
        if ($('#dni').val().length == 0) {
          alert('Por favor, ingrese su DNI');
        return false;
        }
      }
      
</script>




<div class="container-fluid">
<div class="row ">
<div class=" col-12 text-center ">
      <h2>Bienvenido a nuestro sistema de turnos:</h2>
      <h3>Por favor <span class="ingreseDni">INGRESE SU DNI:</span></h3>

      </div>

</div>      



    <div class="row">
        

        <div class="col-lg-12 recuadroTecla">
            <div class="row">
<<<<<<< HEAD
                <form name="form" action="?c=inicio&a=SeleccionarPrioridad" method="post" class="col-lg-12">
=======
                <form name="form" action="?c=inicio&a=SeleccionarOp" method="post" class="col-lg-12">
>>>>>>> c5708a2f394470ddb33debc503ada18ff893169f
                    <br>
                    <div class="input-field ">
                      <input id="dni"name="dni" class="dni"  type="number" data-length="10"  min="1000000" max="999999999999" maxlength="10" required>
                    </div>
                    <div class="row"><!--teclado-->
                     <?php include_once('teclado.php');?>
                    </div>
                    <!--discapacidad-- >
                    <div class="row">
                      <label>
                        <input type="checkbox" name="discapacidad" value="prioridad" />
                        <span>Discapacidad</span>
                      </label>
                    </div>
                    <!- -<input type="hidden" name="idSec" value=1>--><br>
                    
                   
                </form>

                
                
             </div>

        
      
      </div>
      
    </div>
          

    



  </div>

</div>  <!-- Cierre <div class="py-5 bg-light">-->
