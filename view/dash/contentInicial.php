
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CONTENT LG-9 -->
            <div class="border-head">
              <h3>TURNOS EN ESPERA</h3>
            </div>
            



            <!-- INICIO PANEL GRIS -->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart"></div>
                 <canvas id="serverstatus01" height="120" width="120"></canvas>
            </div><!-- /grey-panel -->
                
              

<!-- INICIO TABLA CENTRAL  -->
            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
              <!-- FIN TABLA CENTRAL  -->
              </div>
            <!-- FIN CONTENT GRIS -->











         </div><!-- /row -->
          
<!-- **********************************************************************************************************************************************************
        SIDEBAR DERECHO
        *********************************************************************************************************************************************************** -->
  

          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4 class="centered mt">SIDEBAR DERECHO</h4>
            </div>
            

            <div class="grey-header">
              <h5>SERVER LOAD</h5>
                <form name="form" action="?c=Usuario&a=Llamar" method="post" class="col-lg-12">
                  <input type="hidden" name="nombreUsuario" value=<?php print "$_SESSION[usuario]";?>>
                  <button class="btn btn-primary btn-lg btn-block" type="submit">
                        LLAMAR SIGUIENTE
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



   