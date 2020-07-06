          
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

                    <div class="input-group-prepend">
                        <!--<label for="inputState">Sector &nbsp &nbsp </label>-->
                       
                            <select required name="idOperacion" class="form-control">
                                
                                <?php 
                                
                                  foreach($listadeoperaciones as $listarOp):
                                ?>
                                
                                <option value="<?= $listarOp->idOperacion?>" selected><?=$listarOp->nombreOperacion?></option>
                                
                                <?php 
                                  endforeach;
                                ?> 

                            </select>
                    </div>
                    <br>
                  <input type="hidden" name="nroPuesto" value=<?php echo $_SESSION['puesto'];?>>
                  <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
                  <button class="btn btn-primary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" >
                    LLAMAR SIGUIENTE
                  </button>
                </form>

                <br>

                <form name="form" action="?c=Usuario&a=ReLlamar" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        VOLVER A LLAMAR
                  </button>
                </form>

                 <br>

                 <form name="form" action="?c=Usuario&a=Atender" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        ATENDIENDO
                  </button>
                </form>

                 <br>

                <form name="form" action="?c=Usuario&a=Ausente" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        NO PRESENTE
                  </button>
                </form>


                 <br>

                 <form name="form" action="?c=Usuario&a=Finaliza" method="post" class="col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block btnFuncion" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" disabled>
                        FINALIZAR TURNO
                  </button>
                </form>
                <br>
                <form name="form" action="?c=Usuario&a=DerivarActual" method="post" class="col-lg-12">
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
     
   