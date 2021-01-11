<?php
if (isset($_GET["token"])) {
	$usuario = FormsControlador::SeleccionarRegistros("token", $_GET["token"]);
}
?>

<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-user"> </i> </span>
				</div>
				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Nuevo nombre" id="editarNombre" name="editarNombre">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
				</div>
				<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Nuevo correo" id="editarEmail" name="editarEmail">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
				</div>
				<input type="password" class="form-control" placeholder="Nueva contraseña" id="pwd" name="editarContrasena">
				<input type="hidden" name="contrasenaActual" value="<?php echo $usuario["contrasena"]; ?>">
				<input type="hidden" name="token" value="<?php echo $usuario["token"]; ?>">
			</div>
		</div>

		<?php
		$actualizar = FormsControlador::ActualizarRegistro();

		if ($actualizar == "ok") {
			echo '<script> 
					if( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					} 
					</script>';
			echo '<script>
					var datos = new FormData();
					datos.append("validarToken", "'.md5($_POST["editarNombre"]."+".$_POST["editarEmail"]).'");

					$.ajax({
						url: "ajax/formulariosAjax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta) {
							$("#editarEmail").val(respuesta["email"]);
							$("#editarNombre").val(respuesta["nombre"]);
						}
					});
					</script>';
			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';
		}
		if ($actualizar == "error") {
			echo '<script> if( window.history.replaceState ) {
					window.history.replaceState( null; null; window.location.href );
					} </script>';
			echo '<div class="alert alert-danger">Error al actualizar</div>';
		}
		?>
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>	
</div>