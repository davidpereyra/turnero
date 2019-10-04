<?php 
    $sec = intval($_POST['idSec']); 
    echo "<br>"." sector: ".$sec;
    settype($sec,"integer");
    $dni = htmlspecialchars($_POST['dni']); 
    echo "<br>".$dni;
    $pri = (isset($_REQUEST['discapacidad'])); 
    echo "<br>".$pri;

    if ($pri) {
        $dis="True";
        echo "<br>".$dis;
    }
?>




<ul class="collapsible">
    <table><!-- VENTAS -->
        <li>
        <div class="collapsible-header">
            <i class="material-icons">filter_drama</i>
                Sector de Ventas
                <span class="new badge" data-badge-caption="Ventas"></span></div>
                <div class="collapsible-body">
                    <div class="row center">


                        <div class="col s4">
                            <form action="?c=inicio&a=GenerarTurno" name="seleccionSector" method="POST">
                                <input type="hidden" name="idTurno">
                                <input type="hidden" name="idSector" value=<?php $sec; ?>>
                                <!--<input type="hidden" name="dni" value=<?php $dni; ?>>
                                <input type="hidden" name="discapacidad" value=<?php $pri;?>>-->

                                <button class="btn waves-effect waves-light" type="submit" name="idOperacion" value=1>NOMBRE OPERACION 1
                                <i class="material-icons right">send</i>
                                </button>
                            </form>
                        </div>


                    </div>
                  
                </div>
        </div>                
        </li>
    </table>
</ul>        