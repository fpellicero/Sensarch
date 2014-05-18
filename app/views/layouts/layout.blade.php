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
</body>
</html>