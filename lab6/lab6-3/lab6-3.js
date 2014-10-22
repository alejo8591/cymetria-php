$(document).ready(function(){
	$('#post-json').on('click', function(event){

		$('#response').html('<b>Loading..</h1>');

		data = {
			"nid" : 666686,
			"firstname" : "Alejandro",
			"lastname" : "Romero",
			"phone" : 330303393,
			"email" : "alejo8591@gmail.com"
		};

		$.post('ajax_post_receiver.php', data, function(data){
			$('#response').html(data);
		}).fail(function(){
			$('#response').html('!<h1>Algo salio MAL!</h1>');
		});

		event.preventDefault();
	});
});