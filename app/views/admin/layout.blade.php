<html>
<head>
	<title>Sensarch | Admin</title>
	@include('layouts.global_includes')
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container">
	  	<a class="navbar-brand" href="#">
			<span class="sens">Sens</span><span class="arch">arch</span>
		</a>
	  </div>
	</nav>
	<div class='container'>
		<div class='row'>
			<div class='col-md-2'>
				@yield('sidebar')
			</div>

			<div class='col-md-10'>
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>