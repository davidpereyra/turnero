<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>-->
<?php 
echo "<br>";
echo "turno/index.php";


?>

<script>
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

<p>
<div class="container-fluid">
<?php $t=$this->modelo->TurnoSinBaja()?>
<?=$t->TurnoSinBaja ?> 
</p>



    <div class="row">
        <div class="col-lg-1">I</div>

        <div class="col-lg-10">
            
            <div class="row">
                <form name="form" action="?c=inicio&a=SeleccionarOp" method="post" class="col-lg-12">
                    <label for="input_text" class="dni">Ingrese DNI</label>
                    <div class="input-field textDni">
                      <input id="dni"name="dni" class="dni"  type="number" data-length="10" autofocus="autofocus"  min="1" max="999999999999" maxlength="10" required>
                    </div>
                    <div class="row"><!--teclado-->
                      <?php include_once('teclado.php');?>
                    </div>
                    <!--discapacidad-->
                    <div class="row">
                      <label>
                        <input type="checkbox" name="discapacidad" value="prioridad" />
                        <span>Discapacidad</span>
                      </label>
                    </div>
                    <!--<input type="hidden" name="idSec" value=1>--><br> 
                    <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="validar()">
                      Continuar
                    </button>
                </form>
             </div>

        
      
      </div>
      <div class="col-lg-1">D</div>
    </div>
          

    
<!--<a href="?c=inicio&a=SeleccionarOp" > seguir </a>-->


</div>

<!--

</body>
</html>-->