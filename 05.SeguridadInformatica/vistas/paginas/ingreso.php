<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<label for="email">Correo electrónico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
				</div>
				<input type="email" class="form-control" placeholder="Ingresar correo" id="email" name="ingresoEmail">
			</div>
		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
				</div>
				<input type="password" class="form-control" placeholder="Ingresar contraseña" id="pwd" name="ingresoContrasena">
			</div>
		</div>

		<?php
		$ingreso = new FormsControlador();
		$ingreso -> Ingreso();

		#Esto es si el método es static y retornara algo.
		#$registro = FormsControlador::Registro();
		
		?>
		<button type="submit" class="btn btn-primary">Ingresar</button>
	</form>	
</div>





<!-- <h1>Ingreso</h1>
<form>
	<div class="form-group">
		<label for="email">Correo electrónico:</label>
		<input type="email" class="form-control" placeholder="Ingresar email" id="email">
	</div>
	<div class="form-group">
		<label for="pwd">Contraseña:</label>
		<input type="password" class="form-control" placeholder="Ingresar contraseña" id="pwd">
	</div>
	<div class="form-group form-check">
		<label class="form-check-label">
			<input class="form-check-input" type="checkbox"> Recordarme
		</label>
	</div>
	<button type="submit" class="btn btn-primary">Ingresar</button>
</form> -->