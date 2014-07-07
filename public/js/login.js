var user_id;
var user_img;

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
			'first_name': $('#first_name').val(),
			'last_name': $('#last_name').val(),
			'email': $('#email').val(),
			'password': $('#password').val()
		};

		$.ajax({
			type: 'POST',
			url: '/register',
			data: data,
			success: function (data) {
				user_id = data.user_id;
				$('#user_name').html(data.name);
				console.log(data.user_id)
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
				'first_name': $('#first_name').val(),
				'last_name': $('#last_name').val(),
				'email': $('#email').val()
			}

			if (user_img != null) {
				data.user_img = user_img
			};

			if ($('#current_city').val() || $('#current_country').val()) {
				data.current_address = $('#current_city').val() + ', ' + $('#current_country').val();
			}

			if ($('#current_job').val() || $('#current_company').val()) {
				data.current_job = $('#current_job').val() + ' en ' + $('#current_company').val();
			};

			if ($('#past_job').val() || $('#past_company').val()) {
				data.past_job = $('#past_job').val() + ' en ' + $('#past_company').val();
			};

			if ($('#facebook').val()) {
				data.facebook = $('#facebook').val();
			};

			if ($('#twitter').val()) {
				data.twitter = $('#twitter').val();
			};

			if ($('#instagram').val()) {
				data.instagram = $('#instagram').val();
			};

			if ($('#linkedin').val()) {
				data.linkedin = $('#linkedin').val();
			};

			$.ajax({
				type: 'POST',
				url: '/user/' + user_id,
				data: data,
				success: function  (data) {
					document.location.href = '/user/' + user_id;
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
			$.ajax({
				url: '/images',
				type: 'POST',
				data: {
					'img_type': 'profile',
					'img_data': e.target.result
				},
				success: function (response) {
					user_img = response.image_id;
				}
			})
		}

		reader.readAsDataURL(input.files[0]);
	}
}

