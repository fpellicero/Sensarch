@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
{{ HTML::script('js/edit_profile.js') }}
@stop

@section('content')
<div class='container'>
	<h1>Editar página</h1>
	{{ Form::model($page, array('url' => "page/$page->id", 'files' => 'true', 'class' => 'form-horizontal')) }}
	<div class='row'>
		<div class='col-md-6'>
			<h2>Información básica</h2>
			
			<div class='form-group'>
				<div class='col-md-12'>
					<label for='first_name'>Nombre</label>
					{{ Form::text('name', NULL,array('class' => 'form-control')) }}
					<span class="help-block">El nombre es obligatorio.</span>
				</div>
			</div>

			<div class='form-group'>
				<div class='col-md-12'>
					<label for='page_img'>Sube una foto de perfil</label>
					{{ Form::file('page_img', array('class' => 'form-control', 'id' => 'profile_pic_control')) }}
				</div>
				<div class='col-md-2'>
					<img id='profile_pic_preview' class='rounded-corner	' style='width: 100%;' src="{{ $page->getProfilePicUrl() }}">
				</div>
			</div>

			<div class='form-group'>
				<div class='col-md-12'>
					<label for='address'>Dirección postal</label>
					{{ Form::text('address', NULL, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class='form-group'>
				<div class='col-md-12'>
					<label for='url'>Sitio Web</label>
					{{ Form::text('url', NULL, array('class' => 'form-control')) }}
				</div>
			</div>
		</div>
		
		<div class='col-md-6'>
			<h2>Información adicional</h2>
			<div class='col-md-12'>
				<div class='form-group'>
					<label for='city'>Ciudad</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-home"></i></span>
						{{ Form::text('city', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class='form-group'>
					<label for='country'>País</label>
					<div class='input-group'>
						<span class='input-group-addon'><i class="fa fa-globe"></i></span>
						{{ Form::text('country', NULL, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class='form-group'>
					<label for='country'>Descripción</label>

					{{ Form::textarea('description', NULL, array('class' => 'col-md-12 form-control')) }}
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
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