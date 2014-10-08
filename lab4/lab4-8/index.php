<?php

/* ----- START: Agregado en lab4-8 ---- */
if(get_magic_quotes_gpc()){
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);

	while(list($key, $val) = each($process)){

		foreach ($val as $k => $v) {
			unset($process[$key][$k]);

			if(is_array($v)){

				$process[$key][stripcslashes($k)] = $v;
				$process[] = &$process[$key][stripcslashes($k)];		
			} else {

				$process[$key][stripcslashes($k)] = stripcslashes($v);
			}
		}
	}
	unset($process);
}

// URL para agregar texto a la BD
if(isset($_GET['addmessage'])){
	include 'form.html.php';
	exit();
}
/* ----- END: Agregado en lab4-8 ---- */


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


/* Listar todas las tuplas en la tabla llamada `message` en la BD `test` */
try
{
	$sql = 'SELECT * FROM `message`;';

	// Ejecutamos a través de PDO con el metodo `query` el query generado en el lab4-1 y lo cargamos en la variable $result
	$tuples = $pdo->query($sql);
}
catch(PDOException $e)
{
	$error = 'Error actualizando la tupla en la tabla `message` en la BD `test`: ' . $e->getMessage();
	include 'error.html.php';
	exit();
}

// Verificando los datos para enviarlos en un array

while ($row = $tuples->fetch()){
	$messages[] = $row['message_text'];
}


// Cuando no hubo problemas en la conexión y en la consulta de las tuplas
include 'messages.html.php';


/* ----- START: Agregado en lab4-8 ---- */
if(isset($_POST['message_text'])){
	try{
		$sql = 'INSERT INTO message SET 
				message_text = :message_text,
				message_date = CURDATE()';

		$save_message = $pdo->prepare($sql);

		$save_message->bindValue(':message_text', $_POST['message_text']);

		$save_message->execute();
	
	} catch(PDOException $e){
		$error = 'Error adicionando el mensaje: ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}

	header('Location: .');
	exit();
}
/* ----- END: Agregado en lab4-8 ---- */
?>
