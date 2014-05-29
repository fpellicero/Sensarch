$(function () {
	$('#cover_picture a').click(function() {$('#cover_file').trigger('click')})

	$("#cover_file").change(function() {
		preview_cover(this);
	});

	$('#images').change(function() {
		preview_images(this);
	});

	$('form').submit(function () {

		if(!validateInput()) {
			var data = {
				'title': $('#title').val(),
				'user_id': $('#user_id').val(),
				'description': $('#description').val(),
				'city': $('#city').val(),
				'img_home': img_home,
				'images': images
			};

			$.ajax({
				type: 'POST',
				data: data,
				success: function (data) {
					window.location.href = data.project_id;
				}
			});
		}

		return false;
	});
});

var img_home;
var images;


function validateInput () {
	var errors = false;

	if (!img_home) {
		errors = true;
		$('.add_pic_message').addClass('red');
	}

	if(!$('#title').val()) {
		$('#title_form').addClass('has-error');
		errors = true;
	}

	if (!$('#description').val()) {
		$('#description_form').addClass('has-error');
		errors = true;
	}

	if (!$('#city').val()) {
		$('#city_form').addClass('has-error');
		errors = true;
	}



	return errors;
}

function preview_cover(input) {
	
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function(e) {


			img_home = $('#img_home').attr('src', e.target.result);

			var img = new Image;
			img.src = e.target.result;

			var canvas = document.createElement('canvas');

			canvas.width = 1366;
			var height = canvas.width * (img.height / img.width);
			canvas.height = height;
			
			var ctx = canvas.getContext("2d");
			ctx.drawImage(img, 0, 0, 1366, height);

			$.ajax({
				type: 'POST',
				url: '/images',
				data: {
					"img_type": "cover",
					"img_data": canvas.toDataURL('image/png')
				},
				success: function (response) {
					img_home = response.image_id
				}
			})
		};

		reader.readAsDataURL( input.files[0] );
	}
}

function preview_images (input) {
	images = []
	$('#images_wrapper').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	
	if (!input.files) return;
	
	var files = input.files;

	if(files.length > 6) {
		$('#images_form').addClass('has-error');
		alert('Por favor, introducid 6 imagenes como máximo');
		return false;
	}else {
		$('#images_form').removeClass('has-error');
	}

	for (var i = files.length - 1; i >= 0; i--) {
		var reader = new FileReader();
		reader.onloadend = function(e) {
			$('#images_wrapper').append("<div class='col-md-3 col-md-offset-1'><img class='img_upload_preview' src='" + e.target.result + "'></a></div>");
			
			var img = new Image;
			img.src = e.target.result;
			var imgcanvas = document.createElement('canvas');

			imgcanvas.width = 1366;
			var height = imgcanvas.width * (img.height / img.width);
			imgcanvas.height = height;
			
			var ctx = imgcanvas.getContext("2d");
			ctx.drawImage(img, 0, 0, 1366, height);

			console.log(imgcanvas.toDataURL('image/png'));

			$.ajax({
				url: '/images',
				type: 'POST',
				data: {
					'img_type': 'normal',
					'img_data': imgcanvas.toDataURL('image/png')
				},
				success: function (response) {
					images.push(response.image_id);
				}
			});
			
		}
		reader.readAsDataURL(files[i]);
	};
}