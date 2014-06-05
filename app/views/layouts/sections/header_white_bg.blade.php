<nav class="navbar navbar-white navbar-fixed-top" role="navigation">
	<div class="container">
		<div class='col-md-12'>


			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-bars" style='margin-top: 5px;'></i>
				</button>
				<a class="navbar-brand" href="#">
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
					<li><a href="{{ URL::route('login') }}#login-bottom">CREA TU CUENTA</a></li>
					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</div><!-- /.container-fluid -->
</nav>
<div style='height: 50px;'></div>