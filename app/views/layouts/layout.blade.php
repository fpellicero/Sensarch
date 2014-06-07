<html>
<head>
	<title>Sensarch</title>
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

	@include('layouts.sections.footer')
	@if(Sentry::check())
		<div id='user_id' style='display: none;' user-id="{{Sentry::getUser()->id}}"></div>
	@endif
</body>
</html>