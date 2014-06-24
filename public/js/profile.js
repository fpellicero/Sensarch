$(function () {
	$('#categories a').click(function () {
		var category_id = $(this).attr('category-id');

		$('#categories li').removeClass('active')
		$('li', this).addClass('active')

		var request = $.ajax({
			type: "GET",
			url: window.location.pathname + "/category/" + category_id,
			dataType: "html"
		});

		request.done(function (projects) {
			$('#projects_feed').empty();
			$(projects).appendTo('#projects_feed')
		})
	})
})