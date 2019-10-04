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
echo "tuno/video.php";


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
</script>

<p>
<div class="container">
<?php $t=$this->modelo->TurnoSinBaja()?>
<?=$t->TurnoSinBaja ?> 
</p>



    <div class="row">
        <div class="col s1">I</div>

        <div class="col s10">
            
            <div class="row">
                <form name="form" action="?c=inicio&a=SeleccionarOp" method="post" class="col s12">
                    <label for="input_text">Ingrese DNI</label>
                    <div class="input-field">
                      <input name="dni" class="dni"  type="number" data-length="10" autofocus="autofocus"  min="1" max="999999999999" maxlength="10">
                    </div>
                    <div class="row"><!--teclado-->
                      <?php include_once('teclado.php');?>
                    </div>
                    <div class="row"><!--discapacidad-->
                      <label>
                        <input type="checkbox" name="discapacidad" value="prioridad" />
                        <span>Discapacidad</span>
                      </label>
                    </div>
                    <input type="hidden" name="idSec" value=1>
                    <button class="btn waves-effect waves-light" type="submit">Continuar
                        <i class="material-icons right">send</i>
                    </button>
                   
                </form>
            </div>

        
      
      </div>
      <div class="col s1">D</div>
    </div>
          

    
<!--<a href="?c=inicio&a=SeleccionarOp" > seguir </a>-->


</div>

<!--

</body>
</html>-->