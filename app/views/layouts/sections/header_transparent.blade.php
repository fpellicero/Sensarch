<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
	<div class="container">
		<div class='col-md-12'>


			<!-- Brand and toggle get grouped for better mobile display -->
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
					@if(Sentry::check())
					<li><a href={{ URL::route('home') }}>HOME</a></li>
					<li><a href={{ URL::action('userProfile', array(Sentry::getUser()->id)) }}>PERFIL</a></li>
					<li><a href={{ URL::route('logout') }}>SALIR</a></li>
					@else
					<li class='visible-xs'>
							<form action="{{ URL::route('login') }}" class='form-horizontal' method='post'>
								<div class='row'>
									<div class='col-md-12'>
										<input type='text' class='form-control' placeholder='Email' name='email' style='width: 100%;'>
										<br>
										<input type='password' class='form-control' placeholder='Contraseña' name='password' style='width:100%;'>
										<br>
										<button type="submit" class="btn btn-primary" style='width: 100%;'>Entra</button>

									</div>
								</div>
							</form>
						</li>
						<li>
							<a href="{{ URL::route('login') }}">
								CREA TU CUENTA
							</a>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown hidden-xs">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">ENTRA</a>
							<div class="dropdown-menu" style="min-width: 260px; padding: 15px; padding-bottom: 0px;">
								<form action="{{ URL::route('login') }}" class='form-horizontal' method='post'>
									<div class='row'>
										<div class='col-md-12'>
											<input type='text' class='form-control' placeholder='Email' name='email' style='width: 100%;'>
											<br>
											<input type='password' class='form-control' placeholder='Contraseña' name='password' style='width:100%;'>
											<br>
											<button type="submit" class="btn btn-primary" style='width: 100%;'>Entra</button>

										</div>
									</div>
								</form>
							</div>
						</li>
					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</div><!-- /.container-fluid -->
</nav>