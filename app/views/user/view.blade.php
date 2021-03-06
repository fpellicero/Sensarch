@extends('layouts.layout')

@section('includes')
{{ HTML::style('css/user.profile.css') }}
{{ HTML::script('js/profile.js') }}
@stop

@section('content')

<div class='container' style='margin-top: -24px;'>
	<div class='row'>

		<div class='col-md-12'>
			<div id='user_info_wrapper'>
				@if(Sentry::check() && Sentry::getUser()->id == $user->id)
				<a id='edit_profile_link' href="{{$user->id}}/edit"><i class="fa fa-pencil-square-o"></i> Editar</a>
				@endif

				<div id='profile_img'>
					{{ HTML::image($user->getProfilePicURL()) }}
				</div>

				<div id='user_info'>
					<h1>{{ $user->first_name }} {{ $user->last_name}}</h1>
					@if ($user->current_address)
					<span> {{ $user->current_address }}</span>
					@endif

					<div class='user_occupation'>
						@if ($user->current_job)
						<span class='tag'>ACTUAL:</span> {{ $user->current_job }} <br>
						@endif
						@if ($user->past_job)
						<span class='tag'>ANTERIOR:</span> {{ $user->past_job }}
						@endif
					</div>

					<div class='user_lang'>
						<i class="fa fa-comment-o"></i> Hablo
						<strong>
							@foreach($user->languages as $index => $lang)
							@if($user->languages->count() > $index+1)
							{{ $lang->name }},
							@else
							{{ $lang->name }}
							@endif
							@endforeach
						</strong> 
					</div>

					<div class='user_social'>
						@if ($user->twitter)
						<span>
							<a target='_blank' href="{{ $user->twitter }}">
								<i class="fa fa-twitter-square"></i>
							</a>
						</span>
						@endif

						@if ($user->linkedin)
						<span>
							<a target='_blank' href="{{ $user->linkedin }}">
								<i class="fa fa-linkedin-square"></i>
							</a>
						</span>
						@endif

						@if ($user->facebook)
						<span>
							<a target='_blank' href="{{ $user->facebook }}">
								<i class="fa fa-facebook-square"></i>
							</a>
						</span>
						@endif

						@if ($user->instagram)
						<span>
							<a target='_blank' href="{{ $user->instagram }}">
								<i class="fa fa-instagram"></i>
							</a>
						</span>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-3 hidden-sm hidden-xs'>
			@if(!$user->isActivated())
			<a href="/activate/user/{{$user->id}}/{{$user->activation_code}}">
				<style type="text/css">
				.alert:hover {
					box-shadow: 0px 0px 10px #f5e79e;
				}
				</style>
				<div class='alert alert-warning' style='width: 100%;'>
					Este perfil aún no está activado. Si deseas activarlo, haz click aqui.
				</div>
			</a>
			@endif
			<ul id='categories' class="list-group">
				<a href="javascript:void(0)" category-id="-1">
					<li class="list-group-item active">Todos</li>
				</a>
				@foreach($categories as $category)
				<a href="javascript:void(0)" category-id="{{$category->id}}">
					<li class="list-group-item">{{ $category->name }}</li>
				</a>
				
				@endforeach
			</ul>
		</div>

		<div class='col-md-9 col-sm-12 col-xs-12'>
			<a href="{{ URL::route('newProject') }}">
				@if(Sentry::check() && Sentry::getUser()->id == $user->id)
				<div id='new_project_block'>
					<div>
						<i class="fa fa-plus-circle"></i><br> CREA UN PROYECTO
					</div>
				</div>
				@endif
			</a>
			<div id='projects_feed'>
				@foreach($projects as $index => $project)
					@include('blocks.project', array('project' => $project, 'user' => NULL))
				@endforeach
			</div>

			
		</div>
	</div>
</div>
@stop