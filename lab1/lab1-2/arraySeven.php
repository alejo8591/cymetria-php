<?php
$dogs = array(
	"Lasie" => "Collie",
	"Bud" => "Shepdog",
	"Rin-Tin-Tin" => "German Shepherd",
	"Snoopy" => "Beagle"
);

foreach ($dogs as $key => $value){
	print "$key es un $value <br />";	
}

$birds = array("parlanchina", "Copeton", "Canario", "Pinguino", "Paloma");

foreach ($birds as $bird) {
	print "$bird ";
	print "<br />";
}

$birds[] = "Azulejo";
$birds[10] = "Colibri";

unset($birds[3]);

foreach ($birds as $bird) {
	print "$bird ";
}



?>