$(document).ready(function(){
	$('#user-form').submit(function(event){

		$('#response').html('<b>Loading...</b>');

		// utilizando `$.ajax()` de jQuery
		$.ajax({
			type: 'POST',
			url : 'ajax_post_receiver.php',
			data : $(this).serialize()
		}).done(function(data){
			$('#response').html(data);
		}).fail(function(){
			$('#response').html('<h1>Algo Salio MAL!</h1>');
		});
		event.preventDefault();
	});
});