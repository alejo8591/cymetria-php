<?php

/* ----- START: Agregado en lab5-2 ---- */

include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php');

/* ----- END: Agregado en lab5-2 ---- */


// URL para agregar texto a la BD
if(isset($_GET['addmessage'])){
	include 'form.html.php';
	exit();
}

/* Listar todas las tuplas en la tabla llamada `message` en la BD `test` */
try
{
	/* ----- START: Agregado en lab5-2 ---- */	
	
	include($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
	
	/* ----- END: Agregado en lab5-2 ---- */


	/* ----- START: Agregado en lab5-1 ---- */

	$sql = 'SELECT message.id, message_text, name, email 
			FROM message INNER JOIN author
			ON author_id = author.id';

	$tuples = $pdo->query($sql);
	/* ----- END: Agregado en lab5-1 ---- */

}
catch(PDOException $e)
{
	$error = 'Error actualizando la tupla en la tabla `message` en la BD `test`: ' . $e->getMessage();

	/* ----- START: Agregado en lab5-2 ---- */	

	include($_SERVER['DOCUMENT_ROOT'] . 'error.html.php');

	/* ----- END: Agregado en lab5-2 ---- */	
	exit();
}

// Verificando los datos para enviarlos en un array

while ($row = $tuples->fetch()){
	/* ----- START: Agregado en lab5-1 ---- */

	$messages[] = array('id' => $row['id'], 
						'message_text' => $row['message_text'],
						'name' => $row['name'],
						'email' => $row['email']
				);

	/* ----- END: Agregado en lab5-1 ---- */
}
// Cuando no hubo problemas en la conexión y en la consulta de las tuplas
include 'messages.html.php';


/* ----- START: Agregado en lab4-8 ---- */
if(isset($_POST['message_text'])){
	try{

		/* ----- START: Agregado en lab5-2 ---- */	
	
		include($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
	
		/* ----- END: Agregado en lab5-2 ---- */

		$sql = 'INSERT INTO message SET 
				message_text = :message_text,
				message_date = CURDATE()';

		$save_message = $pdo->prepare($sql);

		$save_message->bindValue(':message_text', $_POST['message_text']);

		$save_message->execute();
	
	} catch(PDOException $e){
		$error = 'Error adicionando el mensaje: ' . $e->getMessage();
		
		/* ----- START: Agregado en lab5-2 ---- */	

		include $_SERVER['DOCUMENT_ROOT'] . 'error.html.php';

		/* ----- END: Agregado en lab5-2 ---- */

		exit();
	}

	header('Location: .');
	exit();
}
/* ----- END: Agregado en lab4-8 ---- */

/* ----- START: Agregado en lab4-9 ---- */
if(isset($_GET['deletemessage'])) {
	
	try{

		/* ----- START: Agregado en lab5-2 ---- */	
	
		include($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
	
		/* ----- END: Agregado en lab5-2 ---- */

		$sql = 'DELETE FROM `message` WHERE `id` = :id';

		$delete_message = $pdo->prepare($sql);

		$delete_message->bindValue(':id', $_POST['id']);

		$delete_message->execute();
	
	} catch(PDOException $e){
		$error = 'Error eliminando el mensaje: ' . $e->getMessage();

		/* ----- START: Agregado en lab5-2 ---- */	

		include($_SERVER['DOCUMENT_ROOT'] . 'error.html.php');

		/* ----- END: Agregado en lab5-2 ---- */

		exit();
	}

	header('Location: .');

	exit();
}
/* ----- END: Agregado en lab4-9 ---- */
?>
