<html>
	<body>
		<table>
			<tr>
				<td>Cédula</td>
				<td>Nombre</td>
			</tr>
			<?php
				foreach ($students as $student) {
					echo '<tr><td><a href="index.php?student=' . $student->getId() . '">' . $student->getName() . '</a></td><td></tr>';
				}
			?>
		</table>
	</body>
</html>