<?php
function arrayRemove(&$ar, $offset, $length=1)
{
	return array_splice($ar, $offset, $length);
}
$birds = array("parlanchina", "Copeton", "Canario", "Pinguino", "Paloma");

printf("<p>Arreglo original</p><pre>%s</pre>", var_export($birds, true));

$removed = arrayRemove($birds, 2);

printf("<p> Se remueve: %s<br />Y el original: </p><pre>%s</pre>", var_export($removed, true), var_export($birds, true));

?>