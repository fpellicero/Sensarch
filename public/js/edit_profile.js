$(function () {
	$('#profile_img a').click(function() {$('#profile_pic_control').trigger('click')})
	$('#profile_img a').hide()
	$('#profile_img').mouseenter(function() { $('#profile_img a').show() })
	$('#profile_img').mouseleave(function() { $('#profile_img a').hide() })
	$("#profile_pic_control").change(function() {
		readURL(this);
	});
})

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#profile_img img').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}


