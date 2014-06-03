$(function () {
	$("#profile_pic_control").change(function() {
		readURL(this);
	});

	$('.help-block').hide();

	$('.has-error .help-block').show();
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