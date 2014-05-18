$(function () {
	$('#cover_picture a').click(function() {$('#cover_file').trigger('click')})
	$('#cover_picture a').hide()
	$('#cover_picture').mouseenter(function() { $('#cover_picture a').show() })
	$('#cover_picture').mouseleave(function() { $('#cover_picture a').hide() })
	$("#cover_file").change(function() {
		preview_cover(this);
	});

	$('#images').change(function() {
		preview_images(this);
	});
})

function preview_cover(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#cover_picture img').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

function preview_images (input) {
	$('#images_wrapper').html('');
	if (!input.files) return;
	var files = input.files;
	for (var i = files.length - 1; i >= 0; i--) {
		var reader = new FileReader();
		reader.onloadend = function(e) {
			$('#images_wrapper').append("<div class='col-md-3 col-md-offset-1'><a href='#' class='thumbnail'><img class='img_upload_preview' src='" + e.target.result + "'></a></div>");
		}
		reader.readAsDataURL(files[i]);
	};
}