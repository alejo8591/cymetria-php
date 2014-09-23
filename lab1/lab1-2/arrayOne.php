<?php

$my_array = array();

$pets = array("Tweet", "Sylver", "Bugs", "PETT", "Petty");
$person = array("Bill", "Jones", 24, "CO");
$customer = array("first" => "pepe", "last" => "Jones", "age" => 24, "city" => "Bogota");

print "<p>La mascota de la pos 0 es: '$pets[0]'.</p>\n";
print "<p>La edad de la persona es $person[2].</p>\n";
print "<p>el cliente tiene una edad de {$customer['age']}.</p>\n";

?>