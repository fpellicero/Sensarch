<html class='login'>
<div id='login_background'></div>
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
			<div class='col-md-6' id="logo_login">
				<a href={{ URL::route('home') }}>
					<span id="negrita">Sens</span><span id="thin">arch</span>
				</a>
			</div>
			<div class='col-md-6' id='login_form'>
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

		<div class='row' id='login_body'>
				<h1 class='white'>
					Promociónate<br>
					<small class='green'>Profesionalmente con tu portafolio</small>
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

		<div class='row' id='login-bottom'>
			<div class='col-md-4 col-md-offset-1 quote'>
				<p>I don't build in order to have clients. I have clients in order to build.</p>
				<p class='author'>- Ayn Rand</p>
			</div>
			<div class='col-md-5 col-md-offset-2'>
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