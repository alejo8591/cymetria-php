<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Datos del libro</h2>
	<?php

		echo '<span>Titulo: </span><strong>' . $book->title . '</strong><br />'; 
		echo '<span>Autor: </span><strong>' . $book->author . '</strong><br />'; 
		echo '<span>Descripción: </span><strong>' . $book->description . '</strong><br />'; 

	?>
</body>
</html>