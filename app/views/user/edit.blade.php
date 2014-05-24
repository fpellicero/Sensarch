@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
{{ HTML::script('js/edit_profile.js') }}
@stop

@section('content')
<div class='container'>
	<form method='post' enctype="multipart/form-data">
		<div class='col-md-2'>
			<div id='profile_sidebar'>
				
				<div id='profile_img_old'>
					<a href="javascript::void(0)">
						<span class='glyphicon glyphicon-pencil'></span>
						Cambiar
					</a>
					{{ HTML::image($user->getProfilePicURL(),'profile_picture', array('class' => 'img-circle')) }}
				</div>

				<div id='profile_info_old' class='form-group form-inline'>
					<p>
						<input type='text' class='form-control' name='first_name' placeholder='Nombre' value="{{ $user->getFirstName() }}">

						<input type='text' class='form-control' name='last_name' placeholder='Apellido' value="{{ $user->getLastName() }}">
					</p>
				</div>
				<button class='btn btn-success' type='submit'>Save</button>
			</div>

			<input id='profile_pic_control' type='file' style='display: none' onchange="PreviewImage();" name='profile_pic'>
		</div>

		<div class='col-md-9 col-md-offset-1'>
			<a href="{{ URL::route('newProject') }}">
				@if(Sentry::check() && Sentry::getUser()->id == $user->id)
				<div id='new_project_block'>
					<div>
						<i class="fa fa-plus-circle"></i><br> CREA UN PROYECTO
					</div>
				</div>
				@endif
			</a>
			@foreach($projects as $index => $project)
			@include('blocks.project', array('project' => $project, 'user' => NULL))
			@endforeach
		</div>
	</form>
</div>
@stop