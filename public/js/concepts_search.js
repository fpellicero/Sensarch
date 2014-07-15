$(function () {
	$( "#slider-range" ).slider({
		range: true,
		min: 1000,
		max: 100000,
		step: 1000,
		values: [ 1000, 100000 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( ui.values[ 0 ] + "€ - " + ui.values[ 1 ] + "€" );
		}
	});
	$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
		"€ - " + $( "#slider-range" ).slider( "values", 1 ) + "€" );
	
	$('form').submit(function (event) {
		event.preventDefault();
		var data = new Object

		data.query = $('#search_query').val()

		data.categories = new Array();
		$('#categories input').each(function () {
			if ($(this).prop('checked')) {
				data.categories.push($(this).attr('value'));
			}
		})

		data.languages = new Array();
		$('#languages input').each(function () {
			if ($(this).prop('checked')) {
				data.languages.push($(this).attr('value'));
			}
		})

		data.min_prize = $( "#slider-range" ).slider( "values", 0 );
		data.max_prize = $( "#slider-range" ).slider( "values", 1 );

		$.ajax({
			url: '/contests/search',
			type: 'POST',
			data: data,
			success: function (response) {
				if (response) {
					$('#no_results').addClass('hidden');
					$('#concept-feed').html(response);
				}else {
					$('#concept-feed').html('')
					$('#no_results').removeClass('hidden');
				}
				
			}
		});
	})

	$('')
})