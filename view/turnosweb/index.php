<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wizard-v1</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	

</head>
<body>
	<div class="page-content" style="background-color: #ececec">
		<div class="wizard-v1-content">
			<div class="wizard-form">
				<!-- FORMULARIO -->
		        <form class="form-register" id="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-number">Paso 1</span>
			            	<span class="step-text">Infomación Personal</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="nombre">Nombre*</label>
										<input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="apellido">Apellido*</label>
										<input type="text" placeholder="Apellido" class="form-control" id="apellido" name="apellido" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="email">Email*</label>
										<input type="email" placeholder="Email@Email.com" class="form-control" id="email" name="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="telefono">Teléfono*</label>
										<input type="number" placeholder="Teléfono" class="form-control" id="telefono" name="telefono" required>
									</div>
								</div>
								
								
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi fa fa-user"></i></span>
			            	<span class="step-number">Step 2</span>
			            	<span class="step-text">Payment Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="card-type">Card Type</label>
										<select name="card-type" id="card-type" class="form-control">
											<option value="" disabled selected>Select Credit Card Type</option>
											<option value="Business Credit Cards">Business Credit Cards</option>
											<option value="Limited Purpose Cards">Limited Purpose Cards</option>
											<option value="Prepaid Cards">Prepaid Cards</option>
											<option value="Charge Cards">Charge Cards</option>
											<option value="Student Credit Cards">Student Credit Cards</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-3">
										<label for="card-number">Card Number</label>
										<input type="text" name="card-number" class="card-number" id="card-number" placeholder="ex: 489050625008xxxx">
									</div>
									<div class="form-holder">
										<label for="cvc">CVC</label>
										<input type="text" name="cvc" class="cvc" id="cvc" placeholder="xxx">
									</div>
								</div>
								<div class="form-row form-row-2">
									<div class="form-holder">
										<label for="month">Expiry Month</label>
										<select name="month" id="month" class="form-control">
											<option value="" disabled selected>Expiry Month</option>
											<option value="January">January</option>
											<option value="February">February</option>
											<option value="March">March</option>
											<option value="February">February</option>
											<option value="April">April</option>
											<option value="May">May</option>
										</select>
									</div>
									<div class="form-holder">
										<label for="year">Expiry Year</label>
										<select name="year" id="year" class="form-control">
											<option value="" disabled selected>Expiry Year</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi fa fa-user"></i></span>
			            	<span class="step-number">Step 3</span>
			            	<span class="step-text">Confirm Your Details</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Comfirm Details</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Username:</th>
												<td id="username-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email Address:</th>
												<td id="email-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Type:</th>
												<td id="card-type-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Number:</th>
												<td id="card-number-val"></td>
											</tr>
											<tr class="space-row">
												<th>CVC:</th>
												<td id="cvc-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Month:</th>
												<td id="month-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Year:</th>
												<td id="year-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</section>


						<!-- SECTION 4 -- >
			            <h2>
			            	<span class="step-icon"><i class="zmdi fa fa-user"></i></span>
			            	<span class="step-number">Step 3</span>
			            	<span class="step-text">Confirm Your Details</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Comfirm Details</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Username:</th>
												<td id="username-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email Address:</th>
												<td id="email-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Type:</th>
												<td id="card-type-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Number:</th>
												<td id="card-number-val"></td>
											</tr>
											<tr class="space-row">
												<th>CVC:</th>
												<td id="cvc-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Month:</th>
												<td id="month-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Year:</th>
												<td id="year-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
			            </section>
						
						<!-- SECTION 5 -- >
			            <h2>
			            	<span class="step-icon"><i class="zmdi fa fa-user"></i></span>
			            	<span class="step-number">Step 3</span>
			            	<span class="step-text">Confirm Your Details</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Comfirm Details</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Username:</th>
												<td id="username-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email Address:</th>
												<td id="email-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Type:</th>
												<td id="card-type-val"></td>
											</tr>
											<tr class="space-row">
												<th>Card Number:</th>
												<td id="card-number-val"></td>
											</tr>
											<tr class="space-row">
												<th>CVC:</th>
												<td id="cvc-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Month:</th>
												<td id="month-val"></td>
											</tr>
											<tr class="space-row">
												<th>Expiry Year:</th>
												<td id="year-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
			            </section>-->






		        	</div>
		        </form>
			</div>
		</div>
	</div>
	
	
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="assets/js/wizard/jquery.steps.js"></script>
	<script src="assets/js/awizard/main.js"></script>
</body>
</html>