<?php

header("Content-type: text/html; charset=utf-8");

$countries_languages = array(
	"Alemania" => "Aleman",
	"Francia" => "Frances",
	"Colombia" => "Español",
	"Italia" => "Italiano",
	"China" => "Mandarin"
);

printf("<p>Lenguajes: %s.</p>\n", implode(", ", array_values($countries_languages)));
printf("<p>Paises: %s.</p>\n", implode(", ", array_keys($countries_languages)));

?>