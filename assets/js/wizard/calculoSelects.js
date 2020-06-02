//<!-- Script para listar Operaciones -->
//						<script type="text/javascript">
							$(document).ready(function(){
								$('#sector').val();
								recargarListaOperacion();
								$('#sector').change(function(){
								recargarListaOperacion();
							});
							})
//						</script>
//						<script type="text/javascript">
							function recargarListaOperacion(){
								$.ajax({
									type:"POST",
									url:"model/jquery/turnosweb/listarOperaciones.php",				
									data:"nombreSector=" + $('#sector').val(),
									success:function(r){
										$('#operacions').html(r);
										$('#dias').html('<option value="" class="form-control">Seleccione una operacion</option>');
										$('#horario').html('<option value="" class="form-control">Seleccione una operacion</option>');
									}
								});
							}
//						</script>			
//						<!-- Script para habilitar el listado de fecha -->
//						<script type="text/javascript">
							$(document).ready(function(){
								$('#operacions').val();
								recargarListaDias();
								$('#operacions').change(function(){
								recargarListaDias();
							});
							})
//						</script>
//						<script type="text/javascript">
							function recargarListaDias(){
								$.ajax({
									type:"POST",
									url:"model/jquery/turnosweb/listarDias.php",				
									data:"nombreOperacion=" + $('#operacions').val(),
									success:function(x){
										$('#dias').html(x);
										$('#horario').html('<option value="" class="form-control">Seleccione una fecha</option>');
									}
								});
							}
//						</script>	
//						<!-- Script para habilitar el listado de horario -->
//						<script type="text/javascript">
							$(document).ready(function(){
								$('#dias').val();
								recargarListaHora();
								$('#dias').change(function(){
								recargarListaHora();
							});
							})
//						</script>
//						<script type="text/javascript">
							function recargarListaHora(){
								$.ajax({
									type:"POST",
									url:"model/jquery/turnosweb/listarHorarios.php",				
									//data:"diaHabil=" + $('#fecha').val(),
									data:{diaHabil: $('#fecha').val(), operacion:$('#operacion').val()},
									success:function(z){
										$('#horario').html(z);
									}
								});
							}
//						</script>