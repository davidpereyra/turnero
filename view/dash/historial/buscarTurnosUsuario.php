<body>
  <section id="container">
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper mt-4 site-min-height">
        <div class="border-head mt-5 ">
          <h3><i class="fa fa-angle-right"></i> BUSCAR DE TURNOS DE USUARIO</td></h3>
        </div> 
        <!-- DATE TIME PICKERS -->
          <div class="row">
            <div class="col-lg-12">
              <div class="form-panel">
                <form class="form-vertical  style-form" action="?c=Usuario&a=HistoricoTurnosUsuario" method="post">
                  <div class="form-group">                  
                    <label class="control-label col-md-3"> Selecciona fecha y hora de inicio</label>                      
                      <div class="col-lg-8">
                        <div class="input-group date form_datetime-component">
                          <input name="fechaDesde" type="text" class="form-control" readonly="" size="16">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-theme date-set"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div><hr>
                      </div><!--col-md-5-->
                      <label class="control-label col-md-3"> Selecciona fecha y hora de fin</label>
                      <div class="col-lg-8">
                        <div class="input-group date form_datetime-component">
                          <input name="fechaHasta" type="text" class="form-control" readonly="" size="16">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-theme date-set"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div><hr>
                        
                        <br> <br>
                        <button class="btn btn-theme float-right" type="submit">
                            BUSCAR
                        </button>
                   
                      <br> <br> 
                      </div><!--col-md-5-->                      
                  </div>                                                     
                </form>
              </div> <!-- /form-panel -->
            </div> <!-- /col-lg-12 -->
          </div> <!-- row -->
          <!--  TIME PICKERS -->          
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->