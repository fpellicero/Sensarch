$(function() {
	$('#register_form form').submit(function(event) {
		$('#register_form').fadeOut(800, function() {
			$('#more_info_form').fadeIn()
		});
		event.preventDefault();
	});
})