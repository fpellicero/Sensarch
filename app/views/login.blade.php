<html class='login'>
<head>
	<title>Sensarch</title>
	<meta name=viewport content="width=device-width, initial-scale=1">

	{{ HTML::style('css/sensarch_sass.css') }}

	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		{{ HTML::script('js/login.js') }}
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-51360320-1', 'sensarch.com');
	ga('send', 'pageview');
	</script>
</head>
<body id='login-page'>
	<nav class="navbar navbar-white navbar-fixed-top" role="navigation">
		<div class="container">
			<div class='row'>
				<div class='col-md-6 col-sm-4'>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<i class="fa fa-bars" style='margin-top: 5px;'></i>
						</button>
						<a class="navbar-brand" href="{{ URL::route('home') }}">
							<span class="sens">Sens</span><span class="arch">arch</span>
						</a>
					</div>
				</div>
				<div class='col-xs-1 visible-xs'></div>
				<div class='col-md-6 col-sm-8 col-xs-10'>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style='overflow: hidden;'>      
						<ul class="nav navbar-nav navbar-right" style='margin-top: 10px;'>
							<div class='hidden-xs'>
								<form class='form-horizontal' method='post'>
									<div class='row' style='position: relative; right: 30px;'>
										<div class='col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2' style='padding: 0 2px;'>
											<input type='text' class='form-control' placeholder='Email' name='email' style='width: 100%;'>
										</div>

										<div class='col-md-4 col-sm-4' style='padding: 0 2px;'>
											<input type='password' class='form-control' placeholder='Contraseña' name='password' style='width:100%;'>
										</div>

										<div class='col-md-2 col-sm-2' style='padding: 0px 2px;'>
											<button type="submit" class="btn btn-primary" style='width: 100%;'>Entra</button>
										</div>
									</div>
								</form>
							</div>

							<div class='visible-xs'>
								<form class='form-horizontal' method='post'>
									<div class='row'>
										<div class='col-sm-8'>
											<input type='text' class='form-control' placeholder='Email' name='email' style='width: 100%;'>
											<br>
											<input type='password' class='form-control' placeholder='Contraseña' name='password' style='width:100%;'>
											<br>
											<button type="submit" class="btn btn-primary" style='width: 100%;'>Entra</button>

										</div>
									</div>
								</form>
							</div>

							@if (Session::has('errors'))
							<div class="alert alert-danger" style='width: 300px; float: right; text-align: left;'>
								<ul>
									{{ implode('', $errors->all('<li>:message</li>')) }}
								</ul>
							</div>
							@endif
						</div>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</div>
	</div><!-- /.container-fluid -->
</nav>

<div style='height: 50px;'></div>
<div class='container' style='min-height: 500px;'>
	<div id='register_form' class='row'>
		<div class='col-md-8 col-sm-6 hidden-xs'>
			<br>
			<h1>
				Conecta con la arquitectura<br><br>
				<small>Creando y compartiendo tus proyectos con todos</small>
			</h1>
			<br>
			<ul class='top_list hidden-sm'>
				<li>Muestra tus proyectos en curso para recibir sugerencias</li>
				<li>Hazlos públicos para que se muestren como portafolio</li>
				<li>Crea tu página de empresa con todos tus compañeros</li>
				<li>Sigue a tus compañeros favoritos</li>
				<li>Promociónate para que te vea todo el mundo</li>
			</ul>

			<br>
			<span style='color: white; font-size: 2em;'>
				¿A qué esperas?
			</span>

		</div>
		<div class='col-xs-1 visible-xs'></div>
		<div class='col-md-4 col-sm-6 col-xs-10'>
			<script type="text/javascript">
			$(function() {
				$('.top-sidebar').delay(500).fadeIn(800);
			})
			</script>
			<div class='top-sidebar' style='display: none;'>
				<center>
					<p style='font-family: Tahoma; font-size: 1.5em; color: #333333;'>
						Empieza ahora. GRATIS
					</p>
				</center>	
				<form class='form-horizontal'>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-6' style='padding-right: 2px;'>
							<input id='first_name' type='text' class='form-control' placeholder='Nombre' name='first_name'>
						</div>
						<div class='col-md-6 col-sm-6 col-xs-6' style='padding-left: 2px;'>
							<input id='last_name' type='text' class='form-control' placeholder='Apellido	' name='last_name'>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-12'>	
							<input id='email' type='email' class='form-control' placeholder='Correo electrónico' name='email'>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-12'>
							<input id='password' type='password' class='form-control' placeholder='Contraseña' name='password'>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-12'>
							<button style='width: 100%;' type="submit" class="btn btn-green">Crear cuenta</button>
							<center>
								He leído y acepto las <a href="{{URL::route('terms', array('target' => '_blank'))}}">condiciones de uso</a>
							</center>
						</div>
					</div>
				</form>
				<hr>
				<div class='row'>
					<div class='col-md-12'>
						<a href="{{URL::route('home')}}">
							<button class='btn btn-blue' style='width: 100%;'>
								<i class="fa fa-suitcase" style='float: left;'></i>
								Entra como visitante
							</button>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class='row'>
		<div id='more_info_form' class='col-md-12' style='display: none;'>
			<h2>
				Benvenido <span id='user_name'></span>,
				<br>
				<small>Cuéntanos algo sobre ti para irnos conociendo</small>
			</h2>
			<div class='row'>
				<form>
					<div class='col-xs-5'>
						<div class='form-group'>
							<input id='current_city' type='text' name='current_city' class='form-control' placeholder='Ciudad actual'>
						</div>
						<div class='form-group'>
							<input id='current_country' type='text' name='current_country' class='form-control' placeholder='País actual'>
						</div>
						<input id='current_address' type='text' name='current_address' style='display: none;'>
						<br>
						
						<div class='form-group'>
							<input id='current_job' type='text' name='current_job' class='form-control' placeholder='Ocupación actual'>
						</div>
						<div class='form-group'>
							<input id='current_company' type='text' name='current_company' class='form-control' placeholder='Empresa actual'>
						</div>
						<div class='form-group'>
							<input id='past_job' type='text' name='past_job' class='form-control' placeholder='Anterior ocupación'>
						</div>
						<div class='form-group'>						
							<input id='past_company' type='text' name='past_company' class='form-control' placeholder='Anterior empresa'>
						</div>
					</div>

					<div class='col-xs-5'>
						<div class='form-group'>
							<div class='input-group'>
								<span class="input-group-addon">&nbsp;<i class='fa fa-facebook'>&nbsp;</i></span>
								<input id='facebook' type='text' name='facebook' class='form-control' placeholder='facebook.com/'>
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<span class="input-group-addon"><i class='fa fa-twitter'></i></span>
								<input id='twitter' type='text' name='twitter' class='form-control' placeholder='twitter.com/'>
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<span class="input-group-addon"><i class='fa fa-linkedin'></i></span>
								<input id='linkedin' type='text' name='linkedin' class='form-control' placeholder='linkedin.com/'>
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<span class="input-group-addon"><i class='fa fa-instagram'></i></span>						
								<input id='instagram' type='text' name='instagram' class='form-control' placeholder='instagram.com/'>
							</div>
						</div>
					</div>

						<div class='col-xs-2'>
						<div class='form-group'>
							<label for='profile_pic'>Sube una foto de perfil</label>
							{{ Form::file('profile_pic', array('class' => 'form-control hidden', 'id' => 'profile_pic_control')) }}
							<img id='profile_pic_preview' class='rounded-corner	' style='width: 100%;' src="/img/profile_blank.png">
							<center><a id='profile_pic_link' href="javascript:void(0)">Sube una imagen</a></center>
						</div>
					</div>

					<button style='width: 20%; position: absolute; bottom: 25px; right: 25px;' type="submit" class="btn btn-green">Ir a mi perfil</button>
					
				</form>
			</div>
		</div>
	</div>
	<div id='login_img_wrapper'>
		<img id='login_img' src="img/img_background.jpg">
	</div>
</div>
<div class='middle-row'>
	<div class='container'>
		<div class='row'>
			<center>
				<h2>¿Como funciona?</h2>
			</center>
			<br><br>
			<div class='col-md-3 col-sm-3 col-xs-6'>
				<center>
					<p>{{ HTML::image('img/login_middle_1.jpg', '', array('class' => 'login_middle_img')); }}</p>
					<p>Rellena tu perfil</p>
				</center>
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6'>
				<center>
					<p>{{ HTML::image('img/login_middle_2.jpg', '', array('class' => 'login_middle_img')); }}</p>
					<p>Añade tus proyectos</p>
				</center>
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6'>
				<center>
					<p>{{ HTML::image('img/login_middle_3.jpg', '', array('class' => 'login_middle_img')); }}</p>
					<p>Descubre arquitectos</p>
				</center>		
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6'>
				<center>
					<p>{{ HTML::image('img/login_middle_4.jpg', '', array('class' => 'login_middle_img')); }}</p>
					<p>Contacto profesional</p>
				</center>		
			</div>
		</div>
	</div>
</div>

@include('layouts.sections.footer')
</body>
</html>