<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<label for="email">Correo electrónico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
				</div>
				<input type="email" class="form-control" placeholder="Ingresar correo" name="ingresoEmail">
			</div>
		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
				</div>
				<input type="password" class="form-control" placeholder="Ingresar contraseña" name="ingresoContrasena">
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