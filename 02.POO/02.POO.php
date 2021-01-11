<?php
#Una clase es un modelo que se usa para crear objetos que comparten un mismo comportamiento, estado e identidad.
class Automovil {
	#Propiedades son las características de un objeto.
	public $marca;
	public $modelo;

	#Método es el algoritmo asociado a un objeto que indica la capacidad de hacer algo.
	public function Mostrar() {
		echo "<p>¡Hola! Soy un $this->marca, modelo $this->modelo";
	}
}

#Objeto es una entidad provista de métodos a los cuales responde propiedades con valores concretos.
$a = new Automovil();
$a -> marca = "Toyota";
$a -> modelo = "Corolla";
$a -> Mostrar();

$b = new Automovil();
$b -> marca = "Hyundai";
$b -> modelo = "Accent";
$b -> Mostrar();

$c = new Automovil();
$c -> marca = "Mazda";
$c -> modelo = "2";
$c -> Mostrar();

#Abstracción: nuevos tipos de datos (no primitivos).
#Encapsulamiento: organizar el código en grupos lógicos.
#Aislamiento: ocultar detalles de implementación y exponer solo los detalles que sean necesarios
?>