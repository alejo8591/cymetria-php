<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lab6-2</title>
</head>
<body>
	<h1>Usando jQuery para hacer ajax a través del metodo `$.post()`</h1>

	<!-- test con un formulario -->
	<form action="" id="user-form">
		<div><input type="text" name="firstname" placeholder="Firstname" /></div>
		<div><input type="text" name="lastname" placeholder="Lastname" /></div>
		<div><input type="text" name="email" placeholder="email"></div>
		<div><input type="submit" value="Enviar"></div>
	</form> 

	<br />

	<div id="response"></div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="lab6-2.js"></script>
</body>
</html>