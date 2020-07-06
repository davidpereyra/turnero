          
<!-- **********************************************************************************************************************************************************
        SIDEBAR DERECHO
        *********************************************************************************************************************************************************** -->
  

        <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4 class="centered mt">ACCIONES</h4>
            </div>
            

            <div class="grey-header">
              
                <form name="form" action="?c=usuario&a=Llamar" method="post" class="col-lg-12">
                
                  <!--<input type="hidden" name="nombreUsuario" value=<?php //print "$_SESSION[usuario]";?>>-->
                  <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        LLAMAR SIGUIENTE
                  </button>
                </form>

                <br>

                <form name="form" action="?c=usuario&a=ReLlamar" method="post" class="col-lg-12">
                <input type="hidden" name="idTurno" value=<?php print $siguiente->idTurno; ?>>
                <button class="btn btn-primary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit">
                        VOLVER A LLAMAR
                  </button>
                </form>

                 <br>

                 <form name="form" action="?c=usuario&a=Atender" method="post" class="col-lg-12">
                 <input type="hidden" name="idTurno" value=<?php print $siguiente->idTurno; ?>>
                 <button class="btn btn-primary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit">
                        ATENDIENDO
                  </button>
                </form>

                 <br>

                 <form name="form" action="?c=usuario&a=Ausente" method="post" class="col-lg-12">
                 <input type="hidden" name="idTurno" value=<?php print $siguiente->idTurno; ?>>
                 <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        NO PRESENTE
                  </button>
                </form>


                 <br>

                 <form name="form" action="?c=usuario&a=Finaliza" method="post" class="col-lg-12">
                 <input type="hidden" name="idTurno" value=<?php print $siguiente->idTurno; ?>>                 
                 <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        FINALIZAR TURNO
                  </button>
                </form>
                <br>
                <form name="form" action="?c=usuario&a=DerivarActual" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        DERIVAR TURNO
                  </button>
                </form>
                <br><br><br><br><br><br><br><br>

                                



            </div>





          
           </div><!-- /col-lg-3 -->

<!-- **********************************************************************************************************************************************************
        FIN SIDEBAR DERECHO
        *********************************************************************************************************************************************************** -->

