<?php
#Código imperativo o espagueti
$automovil1 = (object)["marca" => "Toyota", "modelo" => "Corolla"];
$automovil2 = (object)["marca" => "Hyundai", "modelo" => "Accent"];

function Mostrar($automovil) {
	echo "<p>¡Hola! Soy un $automovil->marca, modelo $automovil->modelo</p>";
}

Mostrar($automovil1);
Mostrar($automovil2);
?>