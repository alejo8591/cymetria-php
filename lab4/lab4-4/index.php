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
	$output = 'No hay conexión con la base de datos. '. $e->getMessage();
	include 'output.php';
	exit();
}

/* Creación de una tabla llamada `message` en la BD `test` */
try
{
	$sql = 'CREATE TABLE IF NOT EXISTS `test`.`message` (
  				`id` INT(11) NOT NULL AUTO_INCREMENT,
  				`message_text` TEXT NULL DEFAULT NULL,
  				`message_date` DATE NOT NULL,
  				PRIMARY KEY (`id`))
				ENGINE = InnoDB
				DEFAULT CHARACTER SET = utf8
				COLLATE = utf8_general_ci;';

	// Ejecutamos a través de PDO con el metodo `exec` el query generado en el lab4-2
	$pdo->exec($sql);
}
catch(PDOException $e)
{
	$output = 'Error creando la tabla `message` en la BD `test`: ' . $e->getMessage();
	include 'output.php';
	exit();
}
// Cuando no hubo problemas en la conexión y en la creación de la tabla
$output = 'La tabla `message` en la BD `test` se creo correctamente';
include 'output.php';

?>



