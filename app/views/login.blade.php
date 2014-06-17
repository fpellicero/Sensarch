<html class='login'>
<head>
	<title>Sensarch</title>
	{{ HTML::style('css/login.css') }}
	{{ HTML::style('css/icons.css'); }}
	{{ HTML::style('css/fonts.css'); }}

	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-51360320-1', 'sensarch.com');
	ga('send', 'pageview');
	</script>
</head>
<body>
	<nav class="navbar navbar-white navbar-fixed-top" role="navigation">
		<div class="container">
			<div class='col-md-12'>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars" style='margin-top: 5px;'></i>
					</button>
					<a class="navbar-brand" href="{{ URL::route('home') }}">
						<span class="sens">Sens</span><span class="arch">arch</span>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
					<ul class="nav navbar-nav navbar-right" style='margin-top: 10px;'>
						<li>
							<a href="/">
								ENTRA COMO VISITANTE
							</a>
						</li>
						<li>
							<button class='btn btn-primary'>ENTRA</button>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	
	<div style='height: 50px;'></div>
	<div class='container'>
		<div class='row'>
			<div class='col-md-8'>
				<br><br>
				<h1>
					Conecta con la arquitectura <br>
					<small>Creando y compartiendo tus proyectos con todos</small>
				</h1>
				<ul class='top_list'>
					<li>Muestra tus proyectos en curso para recibir sugerencias</li>
					<li>Hazlos públicos para que se muestren como portafolio</li>
					<li>Crea tu página de empresa con todos tus compañeros</li>
					<li>Sigue a tus compañeros favoritos</li>
					<li>Promociónate para que te vea todo el mundo</li>
				</ul>

				<span style='color: white; font-size: 2em;'>
					¿A qué esperas?
				</span>

			</div>
			<div class='col-md-4'>
				<div class='top-sidebar'>
					<center>
						Empieza ahora. GRATIS.
					</center>	
					<form class='form-horizontal' method='post' action="{{URL::route('register')}}">
						<div class='form-group'>
							<div class='col-md-6' style='padding-right: 2px;'>
								<input type='text' class='form-control' placeholder='Nombre' name='first_name'>
							</div>
							<div class='col-md-6' style='padding-left: 2px;'>
								<input type='text' class='form-control' placeholder='Apellido	' name='last_name'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-md-12'>	
								<input type='email' class='form-control' placeholder='Correo electrónico' name='email'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-md-12'>
								<input type='password' class='form-control' placeholder='Contraseña' name='password'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-md-12'>
								<button style='width: 100%;' type="submit" class="btn btn-green">Crear cuenta</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div id='login_img_wrapper'>
			<img id='login_img' src="img/login_background.jpg">
		</div>
	</div>
	<div class='middle-row'>
		<div class='container'>
			<div class='row'>
				<center>
					<h2>¿QUÉ HACEMOS?</h2>
				</center>
				<br><br>
				<div class='col-md-3'>
					<center>
						{{ HTML::image('img/cloud.jpg', '', array('class' => 'login-icon')); }}
						<br>
						<p>Rellena tu perfil</p>
					</center>
				</div>
				<div class='col-md-3'>
					<center>
						{{ HTML::image('img/share.jpg', '', array('class' => 'login-icon')); }}
						<br>
						<p>Añade tus proyectos</p>
					</center>
				</div>
				<div class='col-md-3'>
					<center>
						{{ HTML::image('img/eye.jpg', '', array('class' => 'login-icon')); }}
						<br>
						<p>Descubre arquitectos</p>
					</center>		
				</div>
				<div class='col-md-3'>
					<center>
						{{ HTML::image('img/eye.jpg', '', array('class' => 'login-icon')); }}
						<br>
						<p>Contacto profesional</p>
					</center>		
				</div>
			</div>
		</div>
	</div>

	<div style='background: black; border-top: 3px solid #3f729b;'>
		<div class='container' style='padding: 10px 0; color: #EEEEEE;'>
			<div class='row'>
				<div class='col-md-8'>
					Copyright 2014 Sensarch. Todos los derechos reservados.
				</div>

				<div class='col-md-4'>
					<div class='col-md-4'>
						<a href="https://www.facebook.com/sensarch">
							<i class='fa fa-facebook'></i> facebook
						</a>
					</div>

					<div class='col-md-4'>
						<a href="https://twitter.com/sens_arch">
							<i class='fa fa-twitter'></i> twitter
						</a>
					</div>

					<div class='col-md-4'>
						<a href="https://plus.google.com/103791116641554183460">
							<i class='fa fa-google-plus'></i> google
						</a>
					</div>
				</div>

				
			</div>
		</div>
	</div>
</body>
</html>