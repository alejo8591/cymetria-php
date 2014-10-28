$(document).ready(function(){

	$('#term').keyup(function(){

		$.get('search_json.php?query=' + encodeURI($('#term').val()), function(json){

			$('#results').empty();

			$.each(json, function(key, value){
				$('#results').append(
					'<tr><td class="episode">Titulo: <b>' + value.title + '</b>' +
					'Temporada: <b>' + value.season + '</b>' + 
					'# de Episodio: <b>' + value.episode + '</b>' +
					'Al aire: <b>' + value.aired + '</b></td></tr>' +
					'<tr><td class="summary">' + value.summary + '</td></tr>'
				);
			});

		});
	});

});