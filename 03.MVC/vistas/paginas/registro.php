<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-user"> </i> </span>
				</div>
				<input type="text" class="form-control" placeholder="Ingresar nombre" id="nombre" name="registroNombre">
			</div>
		</div>

		<div class="form-group">
			<label for="email">Correo electrónico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
				</div>
				<input type="email" class="form-control" placeholder="Ingresar correo" id="email" name="registroEmail">
			</div>
		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
				</div>
				<input type="password" class="form-control" placeholder="Ingresar contraseña" id="pwd" name="registroContrasena">
			</div>
		</div>

		<?php
		#$registro = new FormsControlador();
		#$registro -> Registro();

		#Esto es si el método es static y retornara algo.
		$registro = FormsControlador::Registro();

		if ($registro == "ok") {
			#Esto hace que el mensaje de Usuario registrado no se quede por siempre en la vista.
			echo '<script> if( window.history.replaceState ) {
					window.history.replaceState( null; null; window.location.href );
				} </script>';
			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		}
		?>
		<button type="submit" class="btn btn-primary">Registrar</button>
	</form>	
</div>