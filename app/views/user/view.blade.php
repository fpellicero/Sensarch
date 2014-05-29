@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
@stop

@section('content')
<div class='container' style='margin-top: -24px;'>
	<div class='row'>
		<div class='col-md-12'>
			<div id='user_info_wrapper'>
				<div id='profile_img'>
					<img src="/img/profile_blank.png">
				</div>
				<div id='user_info'>
					<h1>Nombre y Apellidos</h1>
					<span>Sant Cugat del Vallès, Catalunya</span>

					<div class='user_occupation'>
						<span class='tag'>ACTUAL:</span> Colaborador en Sensarch
						<br>
						<span class='tag'>ANTERIOR:</span> Estudiante en Escola d'Arquitectura del Vallès
					</div>

					<div class='user_lang'>
						<i class="fa fa-comment-o"></i> Hablo Catalan, Castellano, Inglés, Klingon.
					</div>

					<div class='user_social'>
						<span>
							<a href="#">
								<i class="fa fa-twitter-square"></i>
							</a>
						</span>

						<span>
							<a href="#">
								<i class="fa fa-linkedin-square"></i>
							</a>
						</span>

						<span>
							<a href="#">
								<i class="fa fa-facebook-square"></i>
							</a>
						</span>

						<span>
							<a href="#">
								<i class="fa fa-instagram"></i>
							</a>
						</span>


					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-2 hidden-sm hidden-xs'>
			<div id='profile_sidebar'>
				@include('blocks.user_info_new')->with('user', $user)
			</div>
		</div>

		<div class='col-md-9 col-md-offset-1 col-sm-12 col-xs-12'>
			<div id='profile_top' class='hidden-md hidden-lg'>
				@include('blocks.user_info')->with('user', $user)
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
</div>
@stop