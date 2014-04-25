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
	<header id="header_fixe_blanc">
		<div id="logo">
			<a href={{ URL::route('home') }}>
				<span id="negrita">Sens</span><span id="thin">arch</span>
			</a>
		</div>
	</header>

	{{ HTML::image('img/login_top.jpg', '', array('id' => 'login_top_img')); }}
	<div id='img-spacer'></div>

	<div class='container-fluid' id='icon-login-wrapper'>
		<div class='row'>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/ic1.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Cuelga todos los proyectos que hayas realizado, en nuestro portafolio estandarizado</p>
				</center>
			</div>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/ic2.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Compártelos con quien desees, hazte visible y enseñanos de lo que eres capaz</p>
				</center>
			</div>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/ic3.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Con las visitas de estudios profesionales, ¿tus proyectos serán capaces de atraerlos?</p>
				</center>		
			</div>
		</div>
	</div>

	{{ HTML::image('img/img5.jpg', '', array('id' => 'login_bot_img')); }}



	<!-- check for login error flash var -->

	<div class='well'>
		<center>
			<h1>
				<i>Entra en nuestra versión BETA</i>
				<br>
				<small>Pídenos acceso en info@sensarch.com</small>
			</h1>
		</center>
		@if (Session::has('flash_error'))
			<div id="flash_error" class="alert alert-danger">{{ Session::get('flash_error') }}</div>
		@endif
		<form id='login-input' method='post'>
			<div class='input-group'>
				<span class='input-group-addon'>@</span>
				<input type='text' class='form-control' placeholder='Username' name='username'>
			</div>

			<div class='input-group'>
				<span class='input-group-addon'>@</span>
				<input type='password' class='form-control' placeholder='Password' name='password'>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<div id="footer">
		<ul class="icons">
	        <li><a href="http://www.facebook.com/sensarch/" target="_blank" class="fa fa-twitter solo"><span>Twitter</span></a></li>
	        <li><a href="http://www.twitter.com/sensarchin/" target="_blank" class="fa fa-facebook solo"><span>Facebook</span></a></li>
	        <li><a href="http://plus.google.com/103791116641554183460/" target="_blank" class="fa fa-google-plus solo"><span>Google+</span></a></li>
	    </ul>
	    <div class="copyright">
	        <ul>
	            <li>&copy; Sensarch 2014 - <a href="terms.php" style="text-decoration:none;">Condiciones de servicio</a></li>
	        </ul>
	    </div>
	</div>	
</body>
</html>