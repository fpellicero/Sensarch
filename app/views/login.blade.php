<html>
<head>
	<title>Hello World!</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>

	<!-- check for login error flash var -->
	@if (Session::has('flash_error'))
		<div id="flash_error">{{ Session::get('flash_error') }}</div>
	@endif

	<form id='login-input' method='post'>
		<div class='input-group'>
			<span class='input-group-addon'>@</span>
			<input type='text' class='form-control' placeholder='Username' name='username'>
		</div>

		<div class='input-group'>
			<input type='password' class='form-control' placeholder='Password' name='password'>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>