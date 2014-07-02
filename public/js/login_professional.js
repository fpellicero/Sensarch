var user_id;
var page_name;
var page_id;

$(function() {

	$('#profile_pic_link').click(function  (event) {
		$('#profile_pic_control').click();
		event.preventDefault();
	})
	
	$("#profile_pic_control").change(function() {
		readURL(this);
	});

	$('#register_form form').submit(function(event) {
		var data = {
			'email': $('#email').val(),
			'password': $('#password').val()
		};
		page_name = $('#name').val()

		$.ajax({
			type: 'POST',
			url: '/register/professional',
			data: data,
			success: function (data) {

				$.ajax({
					type: 'POST',
					url: '/page',
					data: {
						'user_id': data.user_id,
						'name': page_name
					},
					success: function (data) {
						page_id = data.page_id
					}
				});
				
				$('#user_name').html(page_name);

				$('#register_form').fadeOut(800, function() {
					$('#more_info_form').fadeIn()
				})
			},
			error: function  (data) {
				alert('Error al crear cuenta. Por favor intentad de nuevo')
			}
		});

		

		$('#more_info_form form').submit(function (event) {
			event.preventDefault();	

			var data = {
				'name': $('#user_name').html(),
				'email': $('#email').val()
			}

			if ($('#city').val()) {
				data.city = $('#city').val()
			}

			if ($('#country').val()) {
				data.country = $('#country').val();
			};

			if ($('#url').val()) {
				data.url = $('#url').val();
			};

			if ($('#address').val()) {
				data.address = $('#address').val();
			};

			if ($('#description').val()) {
				data.description = $('#description').val();
			};

			if ($('#type').val()) {
				data.page_type = $('#type').val();
			};

			if ($('#facebook').val()) {
				data.facebook = $('#facebook').val();
			};

			if ($('#twitter').val()) {
				data.twitter = $('#twitter').val();
			};

			if ($('#linkedin').val()) {
				data.linkedin = $('#linkedin').val();
			};

			console.log(data);

			$.ajax({
				type: 'POST',
				url: '/page/' + page_id,
				data: data,
				success: function  (data) {
					document.location.href = '/page/' + page_id;
				}
			});
		})

		
		event.preventDefault();
	});
})


function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#profile_pic_preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

