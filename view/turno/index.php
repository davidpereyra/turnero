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




<div class="container-fluid">
<div class="row ">
<div class=" col-12 text-center ">
      <h2>Bienvenido a nuestro sistema de turnos:</h2>
      <h3>Por favor <span class="ingreseDni">INGRESE SU DNI:</span></h3>

      </div>

</div>      



    <div class="row">
        <div class="col-lg-1"><!--Izquierdo--></div>

        <div class="col-lg-10 recuadroTecla">
            <div class="row">
                <form name="form" action="?c=inicio&a=SeleccionarOp" method="post" class="col-lg-12">
                    <br>
                    <div class="input-field ">
                      <input id="dni"name="dni" class="dni"  type="number" data-length="10" autofocus="autofocus"  min="1" max="999999999999" maxlength="10" required>
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
                    
                    <br>
                    
                </form>

                
                
             </div>

        
      
      </div>
      <div class="col-lg-1"><!--Derecho--></div>
    </div>
          

    



  </div>

</div>  <!-- Cierre <div class="py-5 bg-light">-->
