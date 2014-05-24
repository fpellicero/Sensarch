@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
{{ HTML::script('js/edit_profile.js') }}
@stop

@section('content')
<div class='container'>
	
		<div class='col-md-2 hidden-sm hidden-xs'>
			<div id='profile_sidebar'>
				@include('blocks/user_info_edit')->with('user', $user)
			</div>
		</div>

		<div class='col-md-9 col-md-offset-1'>
			<div id='profile_top' class='visible-sm visible-xs'>
				@include('blocks/user_info_edit')->with('user', $user)
			</div>
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