<html>
<head>
	<title>Sensarch</title>

	@include('layouts.global_includes')
	
	@yield('includes')
	
</head>
<body>
	@include('layouts.sections.header_white_bg')
	
	@yield('cover_image')

	<div id='content-wrapper'>
		<div class='container'>
			
			@yield('content')

		</div>
	</div>

	@include('layouts.sections.footer')
</body>
</html>