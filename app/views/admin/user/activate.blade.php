<html>
<head>
	<title>Activar Cuenta | Sensarch</title>
	@include('layouts.global_includes')
</head>
<body style='background: #EEEEEE;'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-6 col-md-offset-3'>
				<div style='font-size: 3em; margin-bottom: 0px;'><span class="sens">Sens</span><span class="arch">arch</span></div>
				<div style='background: white; padding: 15px 15px 15px 15px;'>
					
					<h1>Activar Cuenta</h1>
					<p>
						¡Gracias por querer formar parte de Sensarch! Por favor, escoge una contraseña y haz click
						en <i>probar</i> para obtener acceso a tu espacio
					</p>
						<strong>Email:</strong> <i>{{ $user->email }}</i>
					</p>
					<p>
						<strong>Escoge una contraseña:</strong>
					</p>
					
					{{ Form::open(array('role' => 'form')) }}
						<div class='form-group'>
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
						</div>
						<div class='form-group'>
							{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmar contraseña')) }}
						</div>

						@if($errors->any())
							<div class="alert alert-danger">
								{{ $errors->first() }}
							</div>
						@endif

						<div style='text-align: right;'>
							{{ Form::submit("Probar", array('class' => 'btn btn-success'))}}
						</div>
					{{ Form::close() }}

				</div>

			</div>
		</div>
	</div>
</body>
</html>