<?php

header("Content-type: text/html; charset=utf-8");

$customers = array(
	array(
		"firstName" => "Alejandro",
		"lastName" => "Romero",
		"age" => 28,
		"city" => "Bogotá"

	),
	array(
		"firstName" => "Jhonny",
		"lastName" => "Gil",
		"age" => 25,
		"city" => "Bogotá"
	)
);

printf("print_r():<pre>%s</pre>", print_r($customers, TRUE));

printf("var_export():<pre>%s</pre>", var_export($customers, TRUE));

print "var_dump():<pre>";

var_dump($customers);

print "</pre>";
?>