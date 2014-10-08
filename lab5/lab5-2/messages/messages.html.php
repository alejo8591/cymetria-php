<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'); ?>

<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8" />
		<title>Lista de elementos de la tabla</title>
	</head>
	<body>
		<h2>La información es:</h2>
		
		<!-- START: Agregado en lab4-8 -->
		<a href="?addmessage">Agregar un nuevo texto</a><br />
		<!-- END: Agregado en lab4-8 -->

		<?php foreach($messages as $message): ?>
			<!-- START: Agregado en lab4-9 -->
			<form action="?deletemessage" method="post">
				<blockquote>
				<p>
					<?php echo html_out($message['message_text']); ?>
					<input type="hidden" name="id" value="<?php echo $message['id']; ?>" />
					<input type="submit" value="Eliminar Registro" />
					<!-- START: Agregado en lab5-1 -->
					(Creado Por: 
						<a href="mailto:<?php 
						echo html_out($message['email']);  ?>">
							<?php 
							echo html_out($message['name']); ?>
						</a>)
					<!-- END: Agregado en lab5-1 -->
				</p>
			</blockquote>
			</form>
			<!-- END: Agregado en lab4-9 -->
		<?php endforeach; ?>
	</body>
</html>