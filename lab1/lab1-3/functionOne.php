<?php
function validateLogin($username, $password)
{
	$actualUser = "username";
	$actualPassword = "password";

	if (strcmp($username, $actualUser) == 0 && strcmp($password, $actualPassword) == 0) {
		print(strcmp($username, $actualUser));
		return true;
	} else {
		print(strcmp($username, $actualUser));
		return false;

	}
}
if (validateLogin("username", "password")) {
	echo "Ingreso correctamente";
} else {
	echo "Su usuario o password es incorrecto";
}
?>