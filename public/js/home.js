var num_projects = 10;

$(function  () {
	$('#load_more_link').click(function () {
		var request = $.ajax({
			type: "GET",
			url: "/project/list/" + num_projects,
			dataType: "html"
		});

		request.done(function  (projects) {
			$(projects).appendTo('#project-feed');
			num_projects += 10;
		});
	})
})