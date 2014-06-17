<html>
<head>
	<title>Sensarch</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	@yield('tags')
		@include('layouts.global_includes')
	@yield('includes')
</head>
<body>
	
	@section('header')
		@include('layouts.sections.header_white_bg')
	@show
	
	@yield('cover_image')

	<div id='content-wrapper'>
		@yield('content')
		<div style='clear: both'></div>
	</div>

	@section('footer')
		@include('layouts.sections.footer')
	@show

	@if(Sentry::check())
		<div id='user_id' style='display: none;' user-id="{{Sentry::getUser()->id}}"></div>
	@endif
</body>
</html>