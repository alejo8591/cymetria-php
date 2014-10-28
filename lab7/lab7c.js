$(document).ready(function(){

	$('#term').keyup(function(){

		$.get('search_xml.php?query=' + encodeURI($('#term').val()), function(xml){

			$('#results').empty();

			$(xml).find('episode').each(function(){

				$('#results').append(
					'<tr><td class="episode">Titulo: <b>' + $(this).attr('title') + '</b>' +
					'Temporada: <b>' + $(this).attr('season') + '</b>' + 
					'# de Episodio: <b>' + $(this).attr('episode') + '</b>' +
					'Al aire: <b>' + $(this).attr('aired') + '</b></td></tr>' +
					'<tr><td class="summary">' + $(this).text() + '</td></tr>'
				);
			});

		});

	});

});