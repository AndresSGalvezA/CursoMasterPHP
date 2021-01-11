<?php
require_once "../controladores/formsControlador.php";
require_once "../modelos/formulariosModelo.php";

class AjaxFormularios {
	public $validarEmail;
	public $validarToken;  

	public function ajaxValidarEmail() {
		$respuesta = FormsControlador::SeleccionarRegistros("email", $this -> validarEmail);
		echo json_encode($respuesta);
	}

	public function ajaxValidarToken() {
		$respuesta = FormsControlador::SeleccionarRegistros("token", $this -> validarToken);
		echo json_encode($respuesta);
	}
}

if (isset($_POST["validarEmail"])) {
	$valEmail = new AjaxFormularios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();
}

if (isset($_POST["validarToken"])) {
	$valToken = new AjaxFormularios();
	$valToken -> validarToken = $_POST["validarToken"];
	$valToken -> ajaxValidarToken();
}