<?php

/* Conexión con la BD */
try
{
	$pdo = new PDO('mysql:host=localhost;port=8889;dbname=test;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"'); 
}
catch(PDOException $e)
{
	$verification_connection = 'Incorrecta, porque; '. $e->getMessage();
	include 'output.php';
	exit();
}
$verification_connection = 'Correcta';


/* Actualización de una tupla en la tabla llamada `message` en la BD `test` */
try
{
	$sql = 'UPDATE `test`.`message` SET `message_date` = "2014-10-02" WHERE `id` = "7";';

	// Ejecutamos a través de PDO con el metodo `exec` el query generado en el lab4-1 y lo cargamos en la variable $affected_tuple
	$affected_tuple = $pdo->exec($sql);
}
catch(PDOException $e)
{
	$output = 'Error actualizando la tupla en la tabla `message` en la BD `test`: ' . $e->getMessage();
	include 'output.php';
	exit();
}
// Cuando no hubo problemas en la conexión y en la creación de la tabla
$output = "El dato actualizado $affected_tuple en la tabla `message` de la BD `test` se realizo correctamente";
include 'output.php';

?>



