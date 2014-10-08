<?php

function addAnything()
{
	$total = 0;

	$args = func_get_args();

	for ($i=0; $i < count($args) ; $i++) { 
		if (is_int($args[$i])) {
			$total += $args[$i];
		}
	}
	return total;
}

echo addAnything(1,5,4,6,777,12,56);

echo addAnything(1,1, "<br />", "<h1>Como vamos</h1>");

echo addAnything(3,4);

echo addAnything("hola", "mundo", 1, 2, 5, 6, 8, 10, 40);

?>