$(document).ready(function(){

	$('form').submit(function(event){

		$('#name + .error').empty();

		$('#success').empty();

		var post_form = {
			"name" : $('input[name=name]').val()
		};

		$.ajax({
			type : 'POST',
			url : 'process.php',
			dataType : 'JSON',
			data : post_form,
			success: function(data){
				if(!data.success){
					if (data.errors.name){
						$('.error').fadeIn(1000).html(data.errors.name);
					}					
				} else {
					$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>');
				}
			},
			error: function(){
				alert("Algo salio mal en el Servidor");
			}
		});

		event.preventDefaul();

	});
});