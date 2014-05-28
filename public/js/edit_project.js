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

	$('form').submit(function () {

		var data = {
			'title': $('#title').val(),
			'user_id': $('#user_id').val(),
			'description': $('#description').val(),
			'city': $('#city').val(),
			'img_home': img_home.src,
			'images': images
		};

		$.ajax({
			type: 'POST',
			data: data			
		});

		return false;

	});
})

var img_home;
var images;

function preview_cover(input) {
	var canvas = $("canvas")[0];
	var context = canvas.getContext("2d");
	
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function(e) {
			img_home = new Image();
			img_home.onload = function() {
				var height = canvas.width * (img_home.height / img_home.width)
				context.drawImage(img_home, 0, 0, 1366, height);
				img_home.src = canvas.toDataURL('image/png');
			};
			img_home.src = e.target.result;
		};
		reader.readAsDataURL( input.files[0] );
	}
}

function preview_images (input) {
	images = [];

	$('#images_wrapper').html('');
	if (!input.files) return;
	var files = input.files;
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

			images.push(imgcanvas.toDataURL('image/png'));



			
		}
		reader.readAsDataURL(files[i]);
	};
}