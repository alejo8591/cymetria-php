<?php 
$cars = array("chevrolet", "Audi", "Maserati");

echo "Los modelos de carros son: <br />" . $cars[0] . "<br />" . $cars[1] . "<br />" . $cars[2] . "<br />";

$pets = array("perro", "gato", "pajaro", "caballo", "leon");

$pets_length = count($pets);

for($i=0; $i < $pets_length; $i++){
	echo $pets[$i];
	echo "<br />";
}
?>