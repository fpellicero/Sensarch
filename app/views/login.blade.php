<html class='login'>
<head>
	<title>Sensarch</title>
	@include('layouts.global_includes')
	{{ HTML::style('css/login.css') }}
	{{ HTML::style('css/icons.css'); }}
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class='container-fluid'>
		<div class='row' id='login_top'>
			<div class='col-md-3 col-md-offset-1' id="logo_login">
				<a href={{ URL::route('home') }}>
					<span id="negrita">Sens</span><span id="thin">arch</span>
				</a>
			</div>
			<div class='col-md-5 col-md-offset-2' id='login_form'>
				<form class='form-inline' method='post'>
					<div class='form-group' style='width: 50%'>
						<input type='text' class='form-control' placeholder='Email' name='email'>
					</div>

					<div class='form-group'>
						<input type='password' class='form-control' placeholder='Contraseña' name='password'>
					</div>

					<button type="submit" class="btn btn-primary">Entra</button>
				</form>
				@if (Session::has('errors'))
				<div class="alert alert-danger" style='width: 300px; float: right; text-align: left;'>
					<ul>
						{{ implode('', $errors->all('<li>:message</li>')) }}
					</ul>
				</div>
				@endif
			</div>
		</div>
		
		<div id='login_img_wrapper' style='width: 100% !important; overflow-x: hidden !important;'>
			<img id='login_img' src="img/login_background.jpg">
		</div>


		<div class='row' id='login_body'>
			<h1 class='white'>
				PROMOCIÓNATE<br>
				<small>
					PROFESIONALMENTE CON TU PORTAFOLIO <br><br>
					<a href="#login-bottom">
						<i class="fa fa-angle-down"></i>
					</a>
				</small>
			</h1>
		</div>

		<div id='triangle'>
			<div class='white_bg triangle_1'></div>
			{{ HTML::image('img/triangle.png') }}
			<div class='white_bg triangle_2'></div>
		</div>


		<div id='icon-login-wrapper' class='row'>
			<center>
				<h2>¿QUÉ HACEMOS?</h2>
			</center>
			<br><br>
			<div class='col-md-3 col-md-offset-1'>
				<center>
					{{ HTML::image('img/cloud.jpg', '', array('class' => 'login-icon')); }}
					<br>
					<p>sube tus proyectos que te permitan promocionarte</p>
				</center>
			</div>
			<div class='col-md-4 login-icons-mid'>
				<center>
					{{ HTML::image('img/share.jpg', '', array('class' => 'login-icon')); }}
					<br>
					<p>considéralos públicos para <br> que te puedan descubrir</p>
				</center>
			</div>
			<div class='col-md-3'>
				<center>
					{{ HTML::image('img/eye.jpg', '', array('class' => 'login-icon')); }}
					<br>
					<p>descubre nuevos talentos y haz contactos profesionales</p>
				</center>		
			</div>
		</div>

		<div class='row' id='login-bottom'>
			<div class='col-md-5 col-md-offset-1 quote'>
				<p>La inspiración existe, pero tiene que encontrarte trabajando</p>
				<p class='author'>- P. PICASSO</p>
			</div>
			<div class='col-md-4 col-md-offset-1'>
				<div id='login_register'>
					<h3>
						REGÍSTRATE<br>
						<small>ES GRATIS, Y LO SEGUIRÁ SIENDO</small>
					</h3>
					<form method='post' action="{{URL::route('register')}}">
						<div class='form-group form-inline'>
							<input type='text' class='form-control' placeholder='Nombre' name='first_name'>
							<input type='text' class='form-control' placeholder='Apellido	' name='last_name'>
						</div>
						<div class='form-group'>
							<input type='email' class='form-control' placeholder='Correo electrónico' name='email'>
						</div>
						<div class='form-group'>
							<input type='password' class='form-control' placeholder='Contraseña' name='password'>
						</div>
						<button type="submit" class="btn btn-success">Súmate!</button>
					</form>
					<hr>
					<h3>
						<small>O entra a echar un vistazo!</small>
					</h3>
					<a href="{{ URL::route('home') }}">
						<button class='btn btn-primary'>Entrar como visitante</button>
					</a>
				</div>
			</div>
		</div>

		@include('layouts.sections.footer')
	</div>
</div>
</body>
</html>