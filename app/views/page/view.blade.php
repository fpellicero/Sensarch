@extends('layouts.layout')

@section('content')

<div class='container' style='margin-top: -24px;'>
	<div class='row'>

		<div class='col-md-12'>
			<div id='user_info_wrapper'>
				@if(Sentry::check() && Sentry::getUser()->id == $page->user_id)
					<a id='edit_profile_link' href="{{ URL::route('editPage', $page->id) }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
				@endif

				<div id='profile_img'>
					{{ HTML::image($page->getProfilePicURL()) }}
				</div>
	
				<div id='user_info'>
					<h1>{{ $page->name}}</h1>
					@if ($page->city)
						@if($page->country)
							<span>{{$page->city}}, {{$page->country}}</span>
						@else
							<span>{{$page->city}}</span>
						@endif
					@elseif ($page->country)
						<span>{{$page->country}}</span>
					@endif

					@if($page->description)
						<div class='page-description'>
							{{substr($page->description,0,250)}}	
						</div>
					@endif

					
					<div class='user_social'>
						@if ($page->twitter)
							<span>
								<a target='_blank' href="{{ $page->twitter }}">
									<i class="fa fa-twitter-square"></i>
								</a>
							</span>
						@endif

						@if ($page->linkedin)
							<span>
								<a target='_blank' href="{{ $page->linkedin }}">
									<i class="fa fa-linkedin-square"></i>
								</a>
							</span>
						@endif

						@if ($page->facebook)
							<span>
								<a target='_blank' href="{{ $page->facebook }}">
									<i class="fa fa-facebook-square"></i>
								</a>
							</span>
						@endif

						@if ($page->instagram)
							<span>
								<a target='_blank' href="{{ $page->instagram }}">
									<i class="fa fa-instagram"></i>
								</a>
							</span>
						@endif

					</div>
					<div class='page_info'>
						<a href="{{$page->url}}">{{$page->url}}</a>
						|
						{{$page->address}}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-3 hidden-sm hidden-xs'>
		</div>

		<div class='col-md-9 col-sm-12 col-xs-12'>
			<a href="{{ URL::route('newProject') }}">
				@if(Sentry::check() && Sentry::getUser()->id == $page->user_id)
				<div id='new_project_block'>
					<div>
						<i class="fa fa-plus-circle"></i><br> CREA UN PROYECTO
					</div>
				</div>
				@endif
			</a>

			@foreach($projects as $index => $project)
				@include('blocks.project', array('project' => $project, 'user' => NULL, 'page' => $page))
			@endforeach

		</div>
	</div>
</div>
@stop