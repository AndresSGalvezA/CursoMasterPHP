<?php
class FormsControlador {
	static public function Registro() {
		if (isset($_POST["registroNombre"]) && isset($_POST["registroEmail"]) && isset($_POST["registroContrasena"])) {
			$tabla = "registro";
			$datos = array("nombre" => $_POST["registroNombre"], "email" => $_POST["registroEmail"], "contrasena" => $_POST["registroContrasena"]);
			$respuesta = ModeloFormularios::Registro($tabla, $datos);
			return $respuesta;
		}
	}

	static public function SeleccionarRegistros($item = null, $valor = null) {
		$respuesta = ModeloFormularios::SeleccionarRegistros("registro", $item, $valor);
		return $respuesta;
	}

	public function Ingreso() {
		if (isset($_POST["ingresoEmail"]) && isset($_POST["ingresoContrasena"])) {
			$respuesta = ModeloFormularios::SeleccionarRegistros("registro", "email", $_POST["ingresoEmail"]);

			if ($_POST["ingresoEmail"] == "" && $_POST["ingresoContrasena"] == ""  ) { echo '<div class="alert alert-danger">Ingrese sus credenciales</div>'; }
			elseif (is_array($respuesta) && $respuesta[2] == $_POST["ingresoEmail"] && $respuesta[3] == $_POST["ingresoContrasena"]) {
				$_SESSION["validarIngreso"] = "ok";
				echo '<script> if( window.history.replaceState ) {
					window.history.replaceState( null; null; window.location.href );
				} </script>';
				echo '<script> window.location = "index.php?pagina=inicio"; </script>';
			}
			else {
				echo '<script> if( window.history.replaceState ) {
					window.history.replaceState( null; null; window.location.href );
				} </script>';
				echo '<div class="alert alert-danger">Credenciales incorrectas</div>';
			}
			
		}
	}

	static public function ActualizarRegistro() {
		if (isset($_POST["editarNombre"])) {
			if ($_POST["editarContrasena"] != "") { $contrasena = $_POST["editarContrasena"]; }
			else { $contrasena = $_POST["contrasenaActual"]; }
			
			$datos = array("id" => $_POST["id"], "nombre" => $_POST["editarNombre"], "email" => $_POST["editarEmail"], "contrasena" => $contrasena);
			$respuesta = ModeloFormularios::ActualizarRegistro("registro", $datos);
			return $respuesta;
		}	
	}

	public function EliminarRegistro() {
		if (isset($_POST["eliminarRegistro"])) {
			$respuesta = ModeloFormularios::EliminarRegistro("registro", $_POST["eliminarRegistro"]);
			
			if ($respuesta == "ok") {
				echo '<script> if( window.history.replaceState ) {
					window.history.replaceState( null; null; window.location.href );
				} </script>';
				echo '<script> window.location = "index.php?pagina=inicio"; </script>';
			}
		}
	}
}
?>