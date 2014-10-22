<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lab6-4</title>
	<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<form method="post" name="post-form">
		<ul>
			<li>
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name" />
				<span class="error"></span>
			</li>
		</ul>
		<input type="submit" value="Enviar" />
	</form>
	<div id="success"></div>

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="js/lab6-4.js"></script>
</body>
</html>