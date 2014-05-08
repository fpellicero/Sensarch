@extends('layouts.layout')

@section('content')
<div class='row'>
		<div id='profile_img' class='col-md-2 col-md-offset-2'>
			{{ HTML::image('img/profile_blank.jpg') }}
		</div>
		<div id='user_info' class='col-md-6'>
			<h3>{{$user->name}} {{$user->surname}}</h3>
			<h3><small>CIUTAT</small></h3>
			<h4><small>UNIVERSITAT ACTUAL i CURS</small></h4>
			<div id='logged_in_controls' class='well'>
				<a href="{{URL::action('newProject')}}">
					<button type="button" class="btn btn-primary">
						<span class='glyphicon glyphicon-plus-sign'></span>
						Crear nou projecte
					</button>
				</a>
				<a href="{{URL::action('editUserProfile', array($user->id)) }}">
					<button type='button' class='btn btn-success'>
						<span class='glyphicon glyphicon-pencil'></span>
						Modificar Perfil
					</button>
				</a>
			</div>
		</div>
</div>
<br>

<div class='row'>
	@foreach($projects as $index => $project)
	<div class='col-md-4 col-sm-6'>
		@include('blocks.project')->with('project', $project)
	</div>
	@endforeach
</div>
@stop