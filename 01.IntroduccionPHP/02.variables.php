<?php
#Variable numérica
$numero = 5;
echo "Esto es una variable número: $numero ", var_dump($numero), "<br>";

#Variable texto
$palabra = "Palabra";
echo "Esto es una variable texto: $palabra ", var_dump($palabra), "<br>";

#Variable booleana
$booleana = true;
echo "Esto es una variable booleana verdadera: $booleana ", var_dump($booleana), "<br>";

#Arreglo
$colores = array("rojo", "amarillo");
echo "Esto es un arreglo: $colores[0], $colores[1] ", var_dump($colores), "<br>";

#Arreglo con propiedades
$verduras = array("verdura1" => "lechuga", "verdura2" => "cebolla");
echo "Esto es un arreglo con propiedades: $verduras[verdura1], $verduras[verdura2] ", var_dump($verduras), "<br>";

#Objeto
$frutas = (object)["fruta1" => "pera", "fruta2" => "manzana"];
echo "Esto es un objeto: $frutas->fruta1, $frutas->fruta2 ", var_dump($frutas), "<br>";
?>