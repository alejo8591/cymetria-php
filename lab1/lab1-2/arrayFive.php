<?php

header("Content-type: text/html; charset=utf-8");

$countries_languages = array(
	"Alemania" => "Aleman",
	"Francia" => "Frances",
	"Colombia" => "Español",
	"Italia" => "Italiano",
	"China" => "Mandarin"
);

function arrayValuesString($ar)
{
	return sprintf("(%s)", implode(', ', array_values($ar)));
}

function arrayKeysString($arr)
{
	return sprintf("(%s)", implode(', ', array_keys($arr)));
}

echo "<h2>Paises: </h2><br />";
print arrayKeysString($countries_languages);

echo "<h2>Lenguajes: </h2><br />";
print arrayValuesString($countries_languages);

?>