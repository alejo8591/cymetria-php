<html>
	<body>
		<table>
			<tr>
				<td>Titulo</td>
				<td>Autor</td>
				<td>Description</td>
			</tr>
			<?php
				foreach ($books as $title => $book) {
					echo '<tr><td><a href="index.php?book=' . $book->title . '">' . $book->title . '</a></td><td>' . $book->author . '</td><td>' . $book->description . '</td></tr>';
				}
			?>
		</table>
	</body>
</html>