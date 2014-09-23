<?php

function attachText(&$new_text = "")
{
	$new_text = $new_text . " Mundo!";

	echo $new_text . "<span> La variable que llego por parametro de la función </span><br />";
}

function newText(&$other_text = "")
{
	$other_text = "El nuevo valor es " . $other_text;

	echo $other_text . "<span> La variable que llego por parametro de la función </span><br />";
}

$my_string = "¡Hola";

attachText($my_string);

echo $my_string . "<span> La variable normal a nivel global del script </span><br />";

newText($my_string);

$my_long_string = "¡Holalalalalalalalala";

attachText($my_long_string);

echo $my_long_string . "<span> La variable normal a nivel global del script </span><br />";

newText($my_long_string);

?>