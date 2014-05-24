// $(function () {
// 	$('#profile_img a').click(function() {$('#profile_pic_control').trigger('click')})
// 	$('#profile_img a').hide()
// 	$('#profile_img').mouseenter(function() { $('#profile_img a').show() })
// 	$('#profile_img').mouseleave(function() { $('#profile_img a').hide() })
// 	$("#profile_pic_control").change(function() {
// 		readURL(this);
// 	});
// })

// function readURL(input) {
// 	if (input.files && input.files[0]) {
// 		var reader = new FileReader();
// 		reader.onload = function(e) {
// 			$('#profile_img img').attr('src', e.target.result);
// 		}

// 		reader.readAsDataURL(input.files[0]);
// 	}
// }

$(function () {
	$('#profile_sidebar #profile_img_old a').click(function() {$('#profile_sidebar #profile_pic_control').trigger('click')})
	$('#profile_sidebar #profile_img_old a').hide()
	$('#profile_sidebar #profile_img_old').mouseenter(function() { $('#profile_img_old a').show() })
	$('#profile_sidebar #profile_img_old').mouseleave(function() { $('#profile_img_old a').hide() })
	$("#profile_sidebar #profile_pic_control").change(function() {
		readURL(this);
	});
})

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#profile_sidebar #profile_img_old img').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$(function () {
	$('#profile_top #profile_img_old a').click(function() {$('#profile_top #profile_pic_control').trigger('click')})
	$('#profile_top #profile_img_old a').hide()
	$('#profile_top #profile_img_old').mouseenter(function() { $('#profile_top #profile_img_old a').show() })
	$('#profile_top #profile_img_old').mouseleave(function() { $('#profile_top #profile_img_old a').hide() })
	$("#profile_top #profile_pic_control").change(function() {
		readURL2(this);
	});
})

function readURL2(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#profile_top #profile_img_old img').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}