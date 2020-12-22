<?php
class FormsControlador {
	static public function Registro() {
		if (isset($_POST["registroNombre"])) {
			return "ok";
		}
	}
}
?>