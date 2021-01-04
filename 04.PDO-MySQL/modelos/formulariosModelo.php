<?php
require_once "conexion.php";

class ModeloFormularios	 {
	static public function Registro($tabla, $datos) {
		#prepare() prepara una sentencia SQL para ser ejecutada. Los parámetros ocultos (:var1, :var2, ...) ayudan a prevenir inyecciones SQL.
		$stmt = Conexion::Conectar() -> prepare("INSERT INTO $tabla (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)");

		#bindParam() vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);

		if ($stmt -> execute()) { return "ok"; }
		else { print_r(Conexion::Conectar() -> errorInfo()); }
	}

	static public function SeleccionarRegistros($tabla, $item = null, $valor = null) {
		if ($item == null && $valor == null) {
			$stmt = Conexion::Conectar() -> prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y - %r') AS fecha FROM $tabla ORDER BY id DESC");
			$stmt -> execute();

			#fetchAll Devuelve todos los registros.
			return $stmt -> fetchAll();
		}
		else {
			$stmt = Conexion::Conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}
		
		#Cierra la conexión.
		$stmt -> close();

		#Refuerzo de seguridad.
		$stmt = null;
	}

	static public function ActualizarRegistro($tabla, $datos) {
		$stmt = Conexion::Conectar() -> prepare("UPDATE $tabla SET nombre = :nombre, email = :email, contrasena = :contrasena WHERE id = :id");
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt -> execute()) { return "ok"; }
		else { print_r(Conexion::Conectar() -> errorInfo()); }

		$stmt -> close();
		$stmt = null;
	}

	static public function EliminarRegistro($tabla, $valor) {
		$stmt = Conexion::Conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		if ($stmt -> execute()) { return "ok"; }
		else { print_r(Conexion::Conectar() -> errorInfo()); }

		$stmt -> close();
		$stmt = null;
	}
} 
?>