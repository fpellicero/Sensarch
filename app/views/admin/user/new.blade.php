@extends('admin.layout')

@section('content')
	<div class='panel panel-default'>
		<div class='panel-heading'>Afegir Usuari</div>
		{{ Form::open(array('role' => 'form')) }}
			
			<div class='form-group'>
				<label for='first_name'>
					Nombre
				</label>
				{{ Form::text('first_name', NULL, array('class' => 'form-control')) }}
			</div>

			<div class='form-group'>
				<label for='first_name'>
					Apellido
				</label>
				{{ Form::text('last_name', NULL, array('class' => 'form-control')) }}
			</div>

			<div class='form-group'>
				<label for='first_name'>
					Email
				</label>
				{{ Form::email('emal', NULL, array('class' => 'form-control')) }}
			</div>
			{{ Form::submit('Crear') }}
		{{ Form::close() }}
	</div>
@stop