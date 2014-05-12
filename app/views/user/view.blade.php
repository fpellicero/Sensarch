@extends('layouts.layout')

@section('content')
<div id='user_info_wrapper'>
	<div id='profile_img'>
		{{ HTML::image($user->getProfilePicURL()) }}
	</div>
	<div id='user_info'>
		@if(Auth::user()->id == $user->id)
		<a id='edit_profile_link' href="{{URL::action('editUserProfile',array($user->id))}}">
			<span class='glyphicon glyphicon-pencil'></span>
			Editar
		</a>
		@endif
		<h3>{{$user->name}} {{$user->surname}}</h3>
		<h3><small>CIUTAT</small></h3>
		<h4><small>UNIVERSITAT ACTUAL i CURS</small></h4>

	</div>
</div>

<br>

<div id='container'>
	
	@if(Auth::user()->id == $user->id)
	<div class='item'>
		<div class='project'>
			<a href="{{URL::action('newProject')}}">
				<div class='project_block_text'>
					<h1>
						<center>
							<span class='glyphicon glyphicon-plus-sign'></span>
							<br><br>
							<small>Nou Projecte</small>
						</center>
					</h1>
				</div>
			</a>
		</div>
	</div>
	@endif

	@foreach($projects as $index => $project)
	<div class='item'>
		@include('blocks.project')->with('project', $project)
	</div>
	@endforeach

	
</div>
@stop