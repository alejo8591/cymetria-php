<?php

function validEmail($email = "")
{
	return preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+[a-zA-Z0-9_-]$/", $email);
}

$my_email = "alejo8591@gmail.com.co";

if (validEmail($my_email)) {
	echo $my_email . " Es un e-mail valido para el formato de la expresión regular.<br />";
} else {
	echo $my_email . " Es un e-mail invalido para el formato de la expresión regular.";
}


?>