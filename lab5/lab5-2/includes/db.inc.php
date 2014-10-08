<?php

/* ----- START: Agregado en lab5-2 ---- */

/* Conexión con la BD */
try
{
	$pdo = new PDO('mysql:host=localhost;port=8889;dbname=test;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"'); 
}
catch(PDOException $e)
{
	$error = 'Incorrecta, porque; '. $e->getMessage();
	include 'error.html.php';
	exit();
}
$verification_connection = 'Correcta';

/* ----- END: Agregado en lab5-2 ---- */