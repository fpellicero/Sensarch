@extends('layouts.layout')

@section('content')
<div class='row'>
	<div id='profile_img' class='col-md-2 col-md-offset-2'>
		{{ HTML::image('img/profile_blank.jpg') }}
	</div>
	<div id='user_info' class='col-md-6'>
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
	@foreach($projects as $index => $project)
	<div class='item'>
		@include('blocks.project')->with('project', $project)
	</div>
	@endforeach

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
</div>
@stop