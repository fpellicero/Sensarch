<html class='login'>
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
	<div class='container'>
		<div class='row' id='login_top'>
			<div class='col-md-1' id="logo_login">
				<a href={{ URL::route('home') }}>
					<span id="negrita">Sens</span><span id="thin">arch</span>
				</a>
			</div>
			<div class='col-md-6 col-md-offset-7'>
				<form class='form-inline' method='post'>
					<div class='form-group'>
						<input type='text' class='form-control' placeholder='Username' name='username'>
					</div>

					<div class='form-group'>
						<input type='password' class='form-control' placeholder='Password' name='password'>
					</div>

					<button type="submit" class="btn btn-primary">Inicia Sesión</button>
				</form>
			</div>
		</div>

		<div class='row'>
			<div class='col-md-7'>
				<h1 class='white'>
					Relaciónate<br>
					<small>Profesionalmente con tu portafolio</small>
				</h1>
			</div>
			<div class='col-md-5 well'>
				<h1>
					Promociónate<br>
					<small>empieza, és gratis.</small>
				</h1>
				<form>
					<div class='form-group form-inline'>
						<input type='text' class='form-control' placeholder='Nombre' name='name'>
						<input type='text' class='form-control' placeholder='Apellidos' name='surname'>
					</div>
					<div class='form-group'>
						<input type='email' class='form-control' placeholder='Correo electrónico' name='mail'>
					</div>
					<div class='form-group'>
						<input type='password' class='form-control' placeholder='Contraseña' name='pass'>
					</div>
					<hr>
					<button type="submit" class="btn btn-primary">Súmate!</button>

				</form>
			</div>
		</div>
	</div>
</body>
</html>