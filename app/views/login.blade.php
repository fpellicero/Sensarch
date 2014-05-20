<html class='login'>
<head>
	<title>Sensarch</title>
	@include('layouts.global_includes')
	{{ HTML::style('css/sensarch.css'); }}
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
			<div class='col-md-7' id='login_form'>
				<form class='form-inline' method='post'>
					<div class='form-group' style='width: 50%'>
						<input type='text' class='form-control' placeholder='Username' name='username'>
					</div>

					<div class='form-group'>
						<input type='password' class='form-control' placeholder='Password' name='password'>
					</div>

					<button type="submit" class="btn btn-primary">Inicia Sesión</button>
				</form>
			</div>
		</div>
		<img id='login_img' src="/sensarch/public/img/login_background.jpg">


		<div class='row' id='login_body'>
				<h1 class='white'>
					PROMOCIONATE<br>
					<small class='green'>PROFESIONALMENTE CON TU PORTAFOLIO</small>
				</h1>
		</div>

		<div id='triangle'>
			<div class='white_bg triangle_1'></div>
			{{ HTML::image('img/triangle.png') }}
			<div class='white_bg triangle_2'></div>
		</div>


		<div id='icon-login-wrapper' class='row'>
			<center>
				<h1>¿Qué hacemos?</h1>
			</center>
			<br><br><br>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/cloud.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Cuelga todos los proyectos que hayas realizado, en nuestro portafolio estandarizado</p>
				</center>
			</div>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/share.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Compártelos con quien desees, hazte visible y enseñanos de lo que eres capaz</p>
				</center>
			</div>
			<div class='col-md-4'>
				<center>
					{{ HTML::image('img/eye.png', '', array('class' => 'login-icon')); }}
					<br>
					<p>Descubre nuevos talentos y haz contactos profesionales</p>
				</center>		
			</div>
		</div>

		<div class='row' id='login-bottom'>
			<div class='col-md-5 col-md-offset-1 quote'>
				<p>La inspiración existe, pero tiene que encontrarte trabajando</p>
				<p class='author'>- P. Picasso</p>
			</div>
			<div class='col-md-5 col-md-offset-1'>
				<div id='login_register'>
					<h1>
						ENTRA AHORA<br>
						<small>es gratis, y lo seguirá siendo</small>
					</h1>
					<form method='post' action="{{URL::route('register')}}">
						<div class='form-group form-inline'>
							<input type='text' class='form-control' placeholder='Nombre' name='name'>
							<input type='text' class='form-control' placeholder='Apellidos' name='surname'>
						</div>
						<div class='form-group'>
							<input type='email' class='form-control' placeholder='Correo electrónico' name='username'>
						</div>
						<div class='form-group'>
							<input type='password' class='form-control' placeholder='Contraseña' name='password'>
						</div>
						<hr>
						<button type="submit" class="btn btn-success">Súmate!</button>

					</form>
				</div>
			</div>
		</div>

		@include('layouts.sections.footer')
	</div>
</div>
</body>
</html>