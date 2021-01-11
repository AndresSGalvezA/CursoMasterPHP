<?php
#index.php: en él se muestra la salida de las vistas al usuario y también se envían las distintas acciones
#que el usuario envíe al controlador.

#require establece que el código del archivo invocado es requerido (obligatorio) para el funcionamiento
#del programa. Si el archivo especificado en require no se encuentra, saltará un error PHP fatal error y
#el programa se detendrá. require_once impide la carga del mismo archivo más de una vez.
require_once "controladores/plantillaControlador.php";
require_once "controladores/formsControlador.php";
require_once "modelos/formulariosModelo.php";

$plantilla = new PlantillaControlador();
$plantilla -> traerPlantilla();