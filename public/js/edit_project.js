var img_home;
var images;
var images_delete;
var id_spinner;

$(function () {
	id_spinner = 0;
	images_delete = [];
	$('#cover_picture a').click(function() {$('#cover_file').trigger('click')})

	$('.link_delete').click(function () {

		var id = $(this).attr('img');
		images_delete.push(id);
		$('#image-' + id).fadeOut();

	});

	$("#cover_file").change(function() {
		preview_cover(this);
	});

	$('#images').change(function() {
		preview_images(this);
	});

	$('form').submit(function (event) {

		if(!validateInput()) {
			var data = {
				'title': $('#title').val(),
				'private': $('#private').val(),
				'author_id': $('#user_id').val(),
				'description': $('#description').val(),
				'city': $('#city').val(),
				'img_home': img_home,
				'images': images,
				'images_delete': images_delete
			};

			$.ajax({
				type: 'POST',
				data: data,
				success: function (data) {
					window.location.href = '/project/' + data.project_id;
				}
			});
		}

		return false;
	});
});

var num_disables = 0;
function disable_submit () {
	num_disables++;
	$('form button').addClass('disabled');
}

function enable_submit () {
	num_disables--;
	if (num_disables == 0) {$('form button').removeClass('disabled')};
}

function validateInput () {
	var errors = false;

	if (!img_home && !$('form#edit-project').length) {
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

		$('.add_pic_message').attr('style', 'opacity: 0.1;');
		$('#cover_image_loader').show();
		disable_submit();

		var reader = new FileReader();

		reader.onload = function(e) {

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
					$('.add_pic_message').attr('style', '');
					$('#cover_image_loader').hide();
					img_home = response.image_id
					url = response.url.split('.');
					url = url[0] + '-320x250.' + url[1];
					$('#img_home').attr('src', url);

				},
				complete: function (response) {
					enable_submit();
				}
			})
		};

		reader.readAsDataURL( input.files[0] );
	}
}

function deleteImageNew (id) {
	$("#image-new-"+id).fadeOut();

	var index = images.indexOf(id);
	if(index!=-1){

	   images.splice(index, 1);
	}

}

function preview_images (input) {
	images = []
	
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
		$('#images_wrapper').prepend("<div id='spinner-" + id_spinner++ + "' class='col-md-4 col-sm-6 project_page_image'><div class='preview_spinner thumbnail'><i class='fa fa-spin fa-spinner'></i></div></div>");
		disable_submit();
		var reader = new FileReader();
		reader.onloadend = function(e) {
			
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
					enable_submit();
					images.push(response.image_id);
					$('#spinner-' + --id_spinner).remove();
					url = response.url.split('.');
					url = url[0] + '-320x250.' + url[1];
					$('#images_wrapper').prepend("<div id='image-new-" + response.image_id + "' class='col-md-4 col-sm-6 project_page_image'><div class='thumbnail'><a href='javascript:void(0)' class='link_delete' onclick='deleteImageNew(" + response.image_id + ")'><i class='fa fa-times-circle'></i></a><img class='img_project' src=" + url + "></div></div>");

				}
			});
			
		}
		reader.readAsDataURL(files[i]);
	};
}