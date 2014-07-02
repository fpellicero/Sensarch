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
						@if(Sentry::check())
						<li><a href={{ URL::route('home') }}>HOME</a></li>
						@if(Sentry::getUser()->type == 'personal')
							<li><a href={{ URL::action('userProfile', array(Sentry::getUser()->id)) }}>PERFIL</a></li>
						@else
							<li><a href={{ URL::action('showPage', array(Page::where('user_id', Sentry::getUser()->id)->first()->id)) }}>MI PÁGINA</a></li>
						@endif
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
		</div>
	</div><!-- /.container-fluid -->
</nav>
<div style='height: 50px;'></div>