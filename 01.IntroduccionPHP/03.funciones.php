<?php
#Función sin parámetros
function saludo(){
	echo "Hola";
}

saludo();
echo "<br>";

#Función con parámetros
function despedida($adios){
	echo $adios."<br>"; #. es concatenación
}

despedida("Adiós, mundo");

#Función con retorno
function retorno($retornar){
	return $retornar;
}

echo retorno("Retornar");
?>