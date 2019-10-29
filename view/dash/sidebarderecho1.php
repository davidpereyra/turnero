          
<!-- **********************************************************************************************************************************************************
        SIDEBAR DERECHO
        *********************************************************************************************************************************************************** -->
  

        <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4 class="centered mt">ACCIONES</h4>
            </div>
            

            <div class="grey-header">
              
                <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                
                  <input type="hidden" name="nroPuesto" value=<?php echo $_SESSION['puesto'];?>>
                  <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
                  <button class="btn btn-primary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" >
                    LLAMAR SIGUIENTE
                  </button>
                </form>

                <br>

                <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        VOLVER A LLAMAR
                  </button>
                </form>

                 <br>

                 <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        ATENDIENDO
                  </button>
                </form>

                 <br>

                <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        NO PRESENTE
                  </button>
                </form>


                 <br>

                <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        FINALIZAR TURNO
                  </button>
                </form>

                                



            </div>





          
           </div><!-- /col-lg-3 -->

<!-- **********************************************************************************************************************************************************
        FIN SIDEBAR DERECHO
        *********************************************************************************************************************************************************** -->
             
        </div>
        <!-- /row -->

        
      </section>
    </section>
    <!--main content end-->



   