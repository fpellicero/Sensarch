var num_projects = 10;

$(function  () {
	$('#load_more_link').click(function () {
		
		$('.load_more_block a').hide();
		$('.load_more_block span').show();
		var request = $.ajax({
			type: "GET",
			url: "/project/list/" + num_projects,
			dataType: "html"
		});

		request.done(function  (projects) {
			$(projects).appendTo('#project-feed');
			num_projects += 10;
			$('.load_more_block a').show();
			$('.load_more_block span').hide();		
		});
	});

	

	$('.heart.active').click(function () {
		if ($(this).hasClass('like')) {
			var project_id = $(this).attr('project-id');
			var user_id = $('#user_id').attr('user-id');

			$(this).removeClass('like');
			$(this).addClass('dislike');

			$("#like-" + project_id).html(parseInt($("#like-" + project_id).html()) + 1);

			$.ajax({
				url: '/project/' + project_id + '/like',
				type: 'POST',
				data: {
					user_id: user_id
				}
			});
		}else{
			var project_id = $(this).attr('project-id');
			var user_id = $('#user_id').attr('user-id');

			$(this).removeClass('dislike');
			$(this).addClass('like');

			$("#like-" + project_id).html($("#like-" + project_id).html() - 1);

			$.ajax({
				url: '/project/' + project_id + '/dislike',
				type: 'POST',
				data: {
					user_id: user_id
				}
			});
		};

		
	})
})