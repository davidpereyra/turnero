<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Solicitud de reserva - Cocucci Inmobiliaria</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel='stylesheet' href='assets/css/raleway-font.css'>
	<link rel="stylesheet" type="text/css" href="assets/font/wizard/css/material-design-iconic-font.min.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
<?php

?>
</head>
<body>
	<div class="page-content" style="background-color: #ececec">
		<div class="wizard-v1-content">
			<div class="wizard-form">
				<!-- FORMULARIO -->
				<form class="form-register" id="form-register" action="?c=turnosweb&a=GuardarTurnoRemoto" method="POST">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="fa fa-user"></i></span>
			            	<span class="step-number">Paso 1</span>
			            	<span class="step-text">Info</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="terminos">
										
										<p ALIGN="justify">
                                            <?php echo $motivo;?>
										</p>
									
									</div>
								</div>
							</div>
						</section>
						
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="fa fa-user"></i></span>
			            	<span class="step-number">Paso 2</span>
			            	<span class="step-text">Infomación Personal</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!-- <label for="nombre">Nombre*</label> -->
										<input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre" value="<?php echo $nombreCliente;?>" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!-- <label for="apellido">Apellido*</label> -->
										<input type="text" placeholder="Apellido" class="form-control" id="apellido" name="apellido" value="<?php echo $apellidoCliente;?>" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!--  <label for="dni">DNI*</label> -->
										<input type="number" placeholder="DNI" class="form-control" id="dni" name="dni" value="<?php echo $dniCliente;?>" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!-- <label for="email">Email*</label> -->
										<input type="email" placeholder="email@dominio.com" class="form-control" id="email" name="email" value="<?php echo $emailCliente;?>" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!-- <label for="telefono">Teléfono*</label> -->
										<input type="number" placeholder="Teléfono" class="form-control" id="telefono" name="telefono" value="<?php echo $telefonoCliente;?>" required>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="fa fa-calendar"></i></span>
			            	<span class="step-number">Paso 3</span>
			            	<span class="step-text">Detalles del turno</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<label for="sector">Seleccione sector*</label>
									</div>
									<div class="form-holder ">
										<select name="sector" id="sector" class="form-control">
											<option value="0" disabled selected>Seleccione un sector</option>
											<?php foreach ($sectores as $sec ) {  ?>
													<option value="<?php echo $sec->nombreSector;?>"><?php echo $sec->nombreSector;?></option>													
											<?php } ?>											
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="operacions">Seleccione una operacion*</label>
									</div>
									<div class="form-holder">										
										<div id="operacions" name="operacions"></div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="dias">Seleccione una fecha*</label>
									</div>
									<div class="form-holder">									
										<div id="dias" name="dias"></div>																				
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="horario">Seleccione una hora*</label>
									</div>
									<div class="form-holder">									
										<div id="horario" name="horario"></div>																				
									</div>
								</div>								
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<!-- <label for="sector">Comentarios Adhicionales*</label> -->
										<textarea class="form-control" id="comentario"  name="comentario" placeholder="Comentario adhisional." rows="3" value="<?php echo $comentarioReserva;?>"></textarea>						
									</div>
								</div>									
							</div>
			            </section>			            
			            <h2>
			            	<span class="step-icon"><i class="fa fa-list"></i></span>
			            	<span class="step-number">Paso 4</span>
			            	<span class="step-text">Confirmar solicitud.</span>
			            </h2>
			            <section><!-- SECTION 4 -->
			                <div class="inner">
			                	<h3>Confirmar datos</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Nombre:</th>
												<td id="nombre-val"></td>
											</tr>
											<tr class="space-row">
												<th>Apellido:</th>
												<td id="apellido-val"></td>
											</tr>
											<tr class="space-row">
												<th>DNI:</th>
												<td id="dni-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email:</th>
												<td id="email-val"></td>
											</tr>											
											<tr class="space-row">
												<th>Teléfono:</th>
												<td id="telefono-val"></td>
											</tr>
											<tr class="space-row">
												<th>Sector:</th>
												<td id="sector-val"></td>
											</tr>
											<tr class="space-row">
												<th>Operación:</th>
												<td id="operacion-val"></td>
											</tr>
											<tr class="space-row">
												<th>Fecha de turno:</th>
												<td id="fecha-val"><?php echo $nombreDia;?></td>
											</tr>
											<tr class="space-row">
												<th>Hora de turno:</th>
												<td id="hora-val"></td>
											</tr>
											<tr class="space-row">
												<th>Comentario:</th>
												<td id="comentario-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</section>
						<script src="assets/js/wizard/calculoSelects.js">						
						</script>							
						
					</div>
		        </form>
			</div>
		</div>
	</div>
	


</body>
</html>