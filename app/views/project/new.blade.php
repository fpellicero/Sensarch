@extends('layouts.layout')

@section('includes')
{{ HTML::script('js/edit_project.js') }}
@stop

@section('header')
@include('layouts.sections.header_transparent')
@overwrite

@section('cover_image')
<div id='cover_picture'>
	<a href="javascript::void(0)">
		<div class='add_pic_message'>
			<i class="fa fa-camera"></i><br>
			SUBE UNA IMAGEN DE PORTADA
		</div>
	</a>
	<img src='' id='img_home'>
</div>
<div id='cover_picture_spacer'></div>
@stop

@section('content')
<form method='post' enctype="multipart/form-data">
	<div class='container'>
		@if (Session::has('errors'))
		<div class="alert alert-danger">
			<ul>
				{{ implode('', $errors->all('<li>:message</li>')) }}
			</ul>
		</div>
		@endif
		<button type="submit" class="btn btn-success" style='float: right;'><i class='fa fa-save'></i> Crear</button>
		<div class='row'>
			<div class='col-md-6 col-md-offset-3'>
				<center>
					<div id='title_form' class='form-group'>
						<h1>
							<input type='text' class='form-control' id='title' name='title' placeholder='Título del proyecto' >					
						</h1>
					</div>
					<div id='city_form' class='form-group form-inline'>
						<h2>
							<small>
								<strong>{{Sentry::getUser()->getFirstName()}} {{Sentry::getUser()->getLastName()}}</strong> en  
								<input type='text' class='form-control' id='city' name='city' placeholder='Ciudad del proyecto'>
							</small>
						</h2>
					</div>
				</center>
			</div>
		</div>

		<div class='row'>
			<br>
			<div class='col-md-4 col-md-offset-4'>
				<div class='form-group'>
					<label for='private'>
						<i class="fa fa-lock" style='font-size: 0.8em; color: #999;'></i>
						Visibilidad del proyecto:
					</label>
					{{ Form::select('private', array('0' => 'Público', '1' => 'Privado'), NULL, array('id' => 'private', 'class' => 'form-control')); }}
				</div>
			</div>
			<div class='col-md-8 col-md-offset-2 description'>
				<div id='description_form' class='form-group'>
					<textarea rows='15' placeholder='Descripción del proyecto' class='form-control' id='description' name='description'></textarea>
				</div>
				<div id='images_form' class='form-group'>
					<br><br>
					<label>Imágenes</label>
					<input id='images' class='form-control' type="file" name="images[]" multiple>
				</div>
			</div>
		</div>
		<div class='row'>
			<div id='images_wrapper' class='col-md-8 col-md-offset-2'>

			</div>
		</div>
	</div>
	<input id='cover_file' class='form-control hidden' type="file" name="img_home">
	<input id='user_id' type='hidden' value="{{Sentry::getUser()->id}}">

</div>
</form>
@stop