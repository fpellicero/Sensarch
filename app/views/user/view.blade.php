@extends('layouts.layout')

@section('includes')
	{{ HTML::style('css/user.profile.css') }}
@stop

@section('content')
	<div class='container'>
		<div class='col-md-2'>
			<div id='profile_img_old'>
				{{ HTML::image($user->getProfilePicURL()) }}
			</div>

			<div id='profile_info_old'>
				<p>
					{{ $user->getFirstName() }}
					{{ $user->getLastName() }}
				</p>
			</div>
		</div>

		<div class='col-md-9 col-md-offset-1'>
			@foreach($projects as $index => $project)
				@include('blocks.project', array('project' => $project, 'user' => NULL))
			@endforeach
		</div>
	</div>
@stop