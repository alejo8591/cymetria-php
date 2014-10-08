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
			<blockquote>
				<p>
					<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>				
				</p>
			</blockquote>
		<?php endforeach; ?>
	</body>
</html>