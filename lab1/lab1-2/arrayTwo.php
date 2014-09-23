<?php
$customers = array(
	array(
		"firstName" => "Alejandro",
		"lastName" => "Romero",
		"age" => 28,
		"city" => "Bogota"
	),
	array(
		"firstName" => "Jhonny",
		"lastName" => "Gil",
		"age" => 25,
		"city" => "Bogota"
	)

);

$pet_breeds = array(
	"dogs" => array("Poodle", "Dachsund", "Pitbull"),
	"birds" => array("Tucan", "Pollo", "Pinguino"),
	"fish" => array("Gato pez", "globo", "bocachico")
);

printf("<p>la edad del primer cliente es %s, y el nombre del segundo cliente es %s %s.</p>\n", $customers[0]["age"], $customers[1]["firstName"], $customers[1]["lastName"]);

printf("<p> %s y %s</p>", $pet_breeds["dogs"][1], $pet_breeds["fish"][2]);
?>


