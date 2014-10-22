$(document).ready(function(){
	$('#user-form').submit(function(event){

		$('#response').html('<b>Loading...</b>');

		// utilizando `$.post()` de jQuery
		$.post('ajax_post_receiver.php', $(this).serialize(), function(data){
			$('#response').html(data);
		}).fail(function(){
			$('#response').html('<h1>¡Algo salio MAL!');
		});
		
		event.preventDefault();
	});
});