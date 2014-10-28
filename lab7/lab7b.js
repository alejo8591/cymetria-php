var delay_timer = null;

	function getResultsDelay(){

		$.get('search_html.php?query=' + encodeURI($('#term').val()), function(data){
			$('#results').html(data);
		}).fail(function(err){
			console.log(err);
		});

		delay_timer = null;
	}


$(document).ready(function(){

	$('#term').keyup(function(){
		if(delay_timer)
			clearTimeout(delay_timer);
		
		delay_timer = setTimeout(getResultsDelay, 200);
	});

});