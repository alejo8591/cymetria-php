<?php

/* ----- START: Agregado en lab5-2 ---- */

function html($text)
{
	return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function html_out($text)
{
	echo html($text);
}

/* ----- END: Agregado en lab5-2 ---- */

?>