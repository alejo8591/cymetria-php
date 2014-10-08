<?php

try
{
	/* Objeto PDO 
	* motor de base de datos (BD): mysql
	* nombre del host a conectar y que tiene el motor de BD: localhost
	* puerto del servidor que tiene el motor de BD: 8889
	* nombre de la BD dentro del motor de BD: test
	* usuario y contraseña de acceso a la BD y al motor de BD: root
	*
	*/
	// Conexión para MAMP en MAC OS X
	$pdo = new PDO('mysql:host=localhost;port=8889;dbname=test;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', 'root', 'root');
	// Conexión Normal
	//$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
	$output = 'No hay conexión con la base de datos. '. $e->getMessage();
	include 'output.php';
	exit();
}

$output = 'Conexión establecida correctamente';
include 'output.php';