$(function() {
	var container = $('#container')
	container.masonry({
		columnWidth: 350,
		itemSelector:'.item',
		gutter: 15,
		isFitWidth: true
	})
	$('#content-wrapper').height($('#container').height() + 400)
});
