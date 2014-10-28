<?php

include 'Simpsons.php';

$search_items = new Simpsons();

// $episodes = $search_items->find('Bart');

$episodes = $search_items->find($_REQUEST['query']);

if(count($episodes) == 0){
?>

<h1>No hay resultados con esa palabra</h1>

<?php } else {
 ?>
<table>
	<?php foreach ($episodes as $episode) { ?>
	<tr>
		<td class="episode">
			<b><?php echo($episode['title']); ?></b> -
			Temporada: <?php echo($episode['season']); ?> 
			Episodio: <?php echo($episode['episode']); ?> -
			Transmitido el: <?php echo($episode['aired']); ?>
		</td>
	</tr>
	<tr>
		<td class="summary">
			<?php echo($episode['summary']); ?>
		</td>
	</tr>
	<?php }	// cerrando el foreach ?>
</table>

<?php
} // cerrando el else
?>