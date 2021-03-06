<!DOCTYPE html>
<html lang="es-Es">
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
					<?php echo htmlspecialchars($message['message_text'], ENT_QUOTES, 'UTF-8'); ?>
					<input type="hidden" name="id" value="<?php echo $message['id']; ?>" />
					<input type="submit" value="Eliminar Registro" />
					<!-- START: Agregado en lab5-1 -->
					(Creado Por: 
						<a href="mailto:<?php 
						echo htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8');  ?>">
							<?php 
							echo htmlspecialchars($message['name'], ENT_QUOTES, 'utf-8'); ?>
						</a>)
					<!-- END: Agregado en lab5-1 -->
				</p>
			</blockquote>
			</form>
			<!-- END: Agregado en lab4-9 -->
		<?php endforeach; ?>
	</body>
</html>