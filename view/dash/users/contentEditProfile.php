<!doctype html>
<html lang="en">
  <head>
  </head>
  <body>
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?php echo $edad;?></h4>
                  <h6>DE EDAD</h6>
                  <h4><?php echo 'Int. '.$usuario->telefonoInterno .' Cel. '.$usuario->telefonoPersonal; ?></h4>
                  <h6>Contacto</h6>                  
                </div><!-- / right-divider hidden-sm hidden-xs -->
              </div><!-- / col-md-4 profile-text mt mb centered -->
            
              <div class="col-md-4 profile-text">
                <h3><?php echo $usuario->nombreReal .' '.$usuario->apellidoReal; ?></h3>
                <h6><?php echo $usuario->rolUsuario?></h6>
                <p><?php echo $usuario->informacionAdicional?></p>
                <br>                
                <!--<p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Boton</button></p>-->
              </div> <!-- /col-md-4 profile-text-->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="assets/img/profiles/user/<?php echo $usuario->imgUsuario;?>" class="img-circle"></p>
                  <p>
                    <!--<button class="btn btn-theme"><i class="fa fa-check"></i> Boton</button>
                    <form action="?c=usuario&a=ActualizarDatosUsuario" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
                      <button class="btn btn-theme02">Combiar Imágen</button>
                    </form>-->
                  </p>
                </div><!-- /profile-pic-->
              </div><!-- /col-md-4 centered -->
              
            </div><!-- /row content-panel -->            
          </div><!-- /col-lg-12 -->
          
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="col-lg-6 detailed">
                <h4 class="mb">Información Personal </h4>

                <form action="?c=usuario&a=CambiarImagen" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">                        
                  <div class="form-group">   
                    <div class="row">                 
                      <div class="controls col-lg-6">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                          <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> &nbsp; Seleccionar una imágen </span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i>  &nbsp; Presione si desea cambiar imágen</span>
                            <input name="imgUser"type="file" class="default" />
                          </span>                                                
                          
                          <span class="fileupload-preview" style="margin-left:5px;">Tamaño máximo permitido 1MB</span>
                          <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                          <!--<label class="control-label col-lg-12">Tamaño máximo 1MB</label>-->
                        </div><!-- /fileupload fileupload-new -->                     
                      </div><!-- /controls col-lg-8 -->  
                    
                      <div class="controls col-lg-2">
                        <button class="btn btn-primary" type="submit">Subir</button>                  
                      </div><!-- /controls col-lg-2 -->  
                    </div><!-- /row -->  
                  </div><!-- /form-group --> 
                </form>

                <form action="?c=usuario&a=ActualizarDatosUsuario" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">                        
                 
                  <!-- Seleccionar imagen original
                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label"> Avatar</label>-- >
                    <div class="col-lg-10">
                      <input type="file" id="" class="file-pos">
                    </div><!-- /col-lg-10 - ->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Nombres</label> -->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Nombres" name="nombreUser" class="form-control" value="<?php echo $usuario->nombreReal; ?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Apellidos</label> -->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Apellidos" name="apellidoUser" class="form-control" value="<?php echo $usuario->apellidoReal; ?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">DNI</label>-->
                    <div class="col-lg-10">
                      <input type="number" placeholder="DNI" name="dniUser" class="form-control" value="<?php echo $usuario->dniUsuario; ?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->                  
        
                  <div class="form-group">                  
                    <div class="col-lg-10">
                      <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-1960" class="input-append date dpYears">
                        <input type="text" name="fechaNacimiento"readonly="" value="<?php echo $dateNacimiento; ?>" size="16" class="form-control">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div><!-- /input-append date dpYears -->
                      <span class="help-block">Fecha de nacimiento</span>
                    </div><!-- /"col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Rol de usuario</label> -->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Nombre de mi puesto de trabajo" name="rolUser" class="form-control" value="<?php echo $usuario->rolUsuario;?>">
                    </div><!-- /col-lg-6 -->
                  </div><!-- /form-group -->

                  <div class="form-group">                    
                     <!--<label class="col-lg-2 control-label">Presentacion</label>-->
                    <div class="col-lg-10">
                      <textarea rows="3" cols="10" class="form-control" name="infoAdicional" placeholder="Acerca de mi:"><?php echo $usuario->informacionAdicional;?></textarea>
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

              </div><!-- /col-lg-6 detailed-->
              <div class="col-lg-6 detailed">
                <h4 class="mb">Información de Contacto</h4>
               
                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Correo</label>-->
                    <div class="col-lg-10">
                      <input type="email" placeholder="Correo" name="emailUser" class="form-control" value="<?php echo $usuario->correoUsuario;?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->
                  
                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Teléfono</label>-->
                    <div class="col-lg-10">
                      <input type="number" placeholder="Teléfono Interno" name="telInterno" class="form-control" value="<?php echo $usuario->telefonoInterno;?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Teléfono</label>-->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Teléfono Personal" name="telPersonal" class="form-control" value="<?php echo $usuario->telefonoPersonal;?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Teléfono</label>-->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Teléfono de contacto de emergencia" name="telContacto" class="form-control" value="<?php echo $usuario->telefonoEmergencia;?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->

                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Nombre de contacto</label>-->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Nombre de contacto" name="nombreContacto" class="form-control" value="<?php echo $usuario->nombreContacto;?>">
                    </div><!-- /col-lg-10 -->

                  </div><!-- /form-group -->
                  <div class="form-group">
                    <!--<label class="col-lg-2 control-label">Dirección de emergencia</label>-->
                    <div class="col-lg-10">
                      <input type="text" placeholder="Dirección de emergencia" name="dirEmergencia" class="form-control" value="<?php echo $usuario->direccionEmergencia;?>">
                    </div><!-- /col-lg-10 -->
                  </div><!-- /form-group -->
                  
                  <!--
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Boton</button>                      
                    </div><!-- /col-lg-offset-2 col-lg-10 -- >
                  </div><!-- /form-group -->

                  <div class="form-group">                  
                  <div class="col-sm-10">
                    <button class="btn btn-primary btn-lg btn-block btnFuncion" type="submit">
                        ACTUALIZAR MIS DATOS PERSONALES
                    </button>
                  </div>
                </div>      

                </form>
              </div> <!-- /col-lg-6 detailed-->
            </div> <!-- /row content-panel -->
          </div> <!-- /col-lg-12 mt -->
                 
        </div><!-- /row mt -->             
      </section><!-- /wrapper site-min-height -->      
    </section><!-- /MAIN CONTENT -->
    
    <!--main content end-->

      </body>
</html>