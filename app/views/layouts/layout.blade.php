<html>
<head>
	<title>Sensarch</title>
	{{ HTML::style('css/sensarch.css'); }}
	{{ HTML::style('css/icons.css'); }}
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class='page-header' id="header_fixe_negre">
		<div id="logo">
			<a href={{ URL::route('home') }}>
				<span id="negrita">Sens</span><span id="thin">arch</span>
			</a>
		</div>
		<div id='nav_links_header'>
			<a href={{ URL::route('home') }}>HOME</a>
			<a href='#'>PERFIL</a>
			<a href="#">SUEÑA</a>
			<a href={{ URL::route('logout') }}>SALIR</a>
		</div>
	</div>
	
	<div class='container'>
		@yield('content')
	</div>

	<!-- Footer -->
	<div id="footer" style="background: #FFFFFF;">
		<ul class="icons">
			<li><a href="http://www.facebook.com/sensarch/" target="_blank" class="fa fa-twitter solo"><span>Twitter</span></a></li>
			<li><a href="http://www.twitter.com/sensarchin/" target="_blank" class="fa fa-facebook solo"><span>Facebook</span></a></li>
			<li><a href="http://plus.google.com/103791116641554183460/" target="_blank" class="fa fa-google-plus solo"><span>Google+</span></a></li>
		</ul>
		<div class="copyright">
			<ul class="menu">
				<li>&copy; Sensarch 2014 - <a href="terms.php" style="text-decoration:none;">Condiciones de servicio</a></li>
			</ul>
		</div>
	</div>
</body>
</html>