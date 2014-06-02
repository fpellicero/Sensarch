@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
{{ HTML::script('js/edit_profile.js') }}
@stop

@section('content')
<div class='container'>
	<h1>Modificar información personal</h1>
	{{ Form::model($user, array('url' => "user/$user->id", 'files' => 'true', 'class' => 'form-horizontal')) }}
	<div class='row'>

		<div class='col-md-6'>
			<h2>Información básica</h2>
			
			@if($errors->has('first_name') || $errors->has('last_name'))
				<div class='form-group has-error'>
			@else
				<div class='form-group'>
			@endif
				<div class='col-md-6'>
					<label for='first_name'>Nombre</label>
					{{ Form::text('first_name', NULL,array('class' => 'form-control')) }}
					<span class="help-block">El nombre es obligatorio.</span>
				</div>
				<div class='col-md-6'>
					<label for='last_name'>Apellido</label>
					{{ Form::text('last_name', NULL,array('class' => 'form-control')) }}
					<span class="help-block">El apellido es obligatorio.</span>
				</div>
			</div>
			
			@if($errors->has('email'))
				<div class='form-group has-error'>
			@else
				<div class='form-group'>
			@endif
				<div class='col-md-12'>
					<label for='email'>Correo electrónico</label>
					<div class='input-group'>
						<span class='input-group-addon'>
							<i class="fa fa-envelope-o"></i>
						</span>
						{{ Form::email('email', NULL, array('class' => 'form-control')) }}
					</div>
					<span class="help-block">El correo electrónico introducido no es válido.</span>
				</div>
			</div>

			<div class='form-group'>
				<div class='col-md-6'>
					<label for='profile_pic'>Sube una foto de perfil</label>
					{{ Form::file('profile_pic', array('class' => 'form-control', 'id' => 'profile_pic_control')) }}
				</div>
				<div class='col-md-6'>
					<img id='profile_pic_preview' class='rounded-corner	' style='width: 100%;' src="{{ $user->getProfilePicUrl() }}">
				</div>
			</div>
						
		</div>

		<div class='col-md-6'>
			<h2>Modificar contraseña</h2>
			<div class='col-md-12'>
				
				@if($errors->has('password'))
					<div class='form-group has-error'>
				@else
					<div class='form-group'>
				@endif
					<label for='password'>Escribe una contraseña</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-key"></i></span>
						{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
					<span class='help-block'>Las contraseñas introducidas no coinciden</span>
				</div>
				<div class='form-group'>
					<label for='password_confirmation'>Repite la contraseña</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-key"></i></span>
						{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class='row'>
		<div class='col-md-6'>
			<h2>Información adicional</h2>
			<div class='col-md-12'>
				<div class='form-group'>
					<label for='current_address'>Ciudad actual</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-home"></i></span>
						{{ Form::text('current_address', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class='form-group'>
					<label for='current_job'>Trabajo actual</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-building"></i></span>
						{{ Form::text('current_job', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class='form-group'>
					<label for='past_job'>Trabajo anterior</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-building"></i></span>
						{{ Form::text('past_job', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class='form-group'>
					<label for="languages" class='col-md-4'>Idiomas que hablo:</label>
					<select name='languages[]' multiple class='col-md-8 form-select'>
						@foreach($languages as $language)
							<option value="{{ $language->id }}">{{ $language->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class='col-md-6'>
			<h2>Redes sociales</h2>
			<div class='col-md-12'>
				
				@if($errors->has('facebook'))
					<div class='form-group has-error'>
				@else
					<div class='form-group'>
				@endif
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-facebook"></i></span>
						{{ Form::text('facebook', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				@if($errors->has('twitter'))
					<div class='form-group has-error'>
				@else
					<div class='form-group'>
				@endif
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-twitter"></i></span>
						{{ Form::text('twitter', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				@if($errors->has('linkedin'))
					<div class='form-group has-error'>
				@else
					<div class='form-group'>
				@endif
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-linkedin"></i></span>
						{{ Form::text('linkedin', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				@if($errors->has('instagram'))
					<div class='form-group has-error'>
				@else
					<div class='form-group'>
				@endif
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-instagram"></i></span>
						{{ Form::text('instagram', NULL, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<center>
		{{ Form::submit("Guardar", array('class' => 'btn btn-success'))}}
	</center>
	
	{{ Form::close() }}
</div>
@stop