<?php
if (isset($_GET["id"])) {
	$usuario = FormsControlador::SeleccionarRegistros("id", $_GET["id"]);
}
?>

<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-user"> </i> </span>
				</div>
				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Nuevo nombre" id="nombre" name="editarNombre">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
				</div>
				<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Nuevo correo" id="email" name="editarEmail">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
				</div>
				<input type="password" class="form-control" placeholder="Nueva contraseña" id="pwd" name="editarContrasena">
				<input type="hidden" name="contrasenaActual" value="<?php echo $usuario["contrasena"]; ?>">
				<input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">
			</div>
		</div>

		<?php
		$actualizar = FormsControlador::ActualizarRegistro();

		if ($actualizar == "ok") {
				echo '<script> if( window.history.replaceState ) {
						window.history.replaceState( null; null; window.location.href );
						} </script>';
				echo '<div class="alert alert-success">El usuario ha sido actualizado</div>
				<script> setTimeout(function() {
					window.location = "index.php?pagina=inicio";
				}, 3000); </script>';
			}
		?>
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>	
</div>