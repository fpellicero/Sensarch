@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
@stop

@section('content')
<div class='container'>
	<div class='col-md-2'>
		<div id='profile_sidebar'>
			@if(Sentry::check() && Sentry::getUser()->id == $user->id)
			<a id='edit_profile_link' href="{{URL::action('editUserProfile',array($user->id))}}">
				<span class='glyphicon glyphicon-pencil'></span>
				Editar
			</a>
			@endif
			<div id='profile_img_old'>
				{{ HTML::image($user->getProfilePicURL(),'profile_picture', array('class' => 'img-circle')) }}
			</div>

			<div id='profile_info_old'>
				<p>
					{{ $user->getFirstName() }}
					{{ $user->getLastName() }}
				</p>
			</div>
		</div>
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
</div>
@stop