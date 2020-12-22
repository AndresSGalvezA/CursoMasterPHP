<?php
#Condiciones
$a = 15;
$b = 10;

if($a > $b) {
	echo "a es mayor que b.<br>";
}
else if($a == $b) {
	echo "a es igual a b.<br>";
}
else {
	echo "a es menor que b.<br>";
}

#Switch
$dia = "lunes";

switch ($dia) {
	case 'sabado':
		echo "Voy a estudiar PHP.<br>";
		break;
	
	case 'viernes':
		echo "Voy a la fiesta.<br>";
		break;

	case 'domingo':
		echo "Voy a descansar.<br>";
		break;

	default:
		echo "Voy a la universidad.<br>";
		break;
}

echo "Ciclo while: ";

#Ciclo While
$n = 1;

while ($n <= 5) {
	echo $n;
	$n++;
}

echo "<br>Ciclo do while: ";

#Ciclo DoWhile
$p = 1;

do{
	echo $p;
	$p++;
}
while($p <= 5);

echo "<br>Ciclo for: ";

#Ciclo for
for ($i = 1; $i <= 5; $i++) {  
	echo $i;
}

echo "<br>Ciclo foreach: ";

#Ciclo foreach
$nums = array(1, 2, 3, 4, 5);

foreach ($nums as $n) {
	echo $n;
}
?>