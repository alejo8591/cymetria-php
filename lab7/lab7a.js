$(document).ready(function(){

	$('#term').keyup(function(){
		$.get('search_html.php?query=' + encodeURI($('#term').val()), function(data){
			$('#results').html(data);
			}).fail(function(err){
			console.log(err);
		});
});
});