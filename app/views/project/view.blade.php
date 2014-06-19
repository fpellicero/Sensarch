@extends('layouts.layout')

@section('includes')
	{{ HTML::style('packages/lightbox/css/lightbox.css') }}
	{{ HTML::script('packages/lightbox/js/lightbox.min.js') }}
	{{ HTML::script('js/home.js') }}
@stop

@section('header')
@include('layouts.sections.header_transparent')
@overwrite

@section('cover_image')
<div id='cover_picture'>
	<img src="{{ Croppa::url($project->getCoverImgURL(),1366,600, array('quadrant' => 'C')) }}">
</div>
<div id='cover_picture_spacer'></div>
@stop

@section('tags')
	<meta property='og:title' content="{{$project->title}}">
	<meta property='og:url' content="{{ URL::route('showProject', array($project->id)) }}">
	<meta property='og:description' content="{{$project->description}}">
@stop

@section('content')

<div id='project_page' class='container'>
	@if(Sentry::check() && Sentry::getUser()->id == $project->author_id)
	<div class='col-md-2 col-md-offset-9 project_context_links'>
		<a href="{{ URL::route('editProject', $project->id) }}">
			<i class='fa fa-edit'></i> Edit
		</a>
		|
		<a href="{{ URL::route('destroyProject', $project->id) }}">
			<i class="fa fa-trash-o"></i> Delete
		</a>
	</div>
	@endif
	<div class='row'>
		<div class='col-md-6 col-md-offset-3'>
			<center>
				<h1 class='project_page_title'>
					{{ $project->title }}
				</h1>
				<h2 class='project_page_subtitle'>
					<small>
						<strong>
							<a href="{{ URL::route('userProfile', $user->id) }}">
								{{ $user->getFirstName() }} {{ $user->getLastName() }}
							</a>
						</strong>
						en {{ $project->city }}
					</small>
				</h2>

				<div class='contextual'>
					<div class='likes'>
						<span id="like-{{$project->id}}" class='count'>{{ count($project->likes) }}</span>
						@if(Sentry::check() && Sentry::getUser()->likesProject($project->id))
						<div project-id="{{$project->id}}" class='heart img-circle dislike active'>
							<i class="fa fa-heart-o"></i>
						</div>
						@elseif (Sentry::check())
						<div project-id="{{$project->id}}" class='heart img-circle like active'>
							<i class="fa fa-heart-o"></i>
						</div>
						@else
						<div class='heart img-circle'>
							<i class="fa fa-heart-o"></i>
						</div>
						@endif
					</div>


				</div>

			</center>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-10 col-md-offset-1 description'>
			{{ nl2br($project->description) }}
		</div>
	</div>

	<div class='row'>
		<div id='images_wrapper' class='col-md-8 col-md-offset-2'>
			@foreach ($project->images as $index => $image)

			@if($image->img_type == 'normal')
			<div class='col-md-4 col-sm-6 project_page_image' id="image-{{$image->id}}">
				<div class='thumbnail'>
					<a data-lightbox="{{$project->title}}" href="/projects/{{ $project->id }}/{{ $image->filename }}">
						<img class='img_project' src="{{ Croppa::url('/projects/' . $project->id . '/' . $image->filename, 320, 250); }}">
					</a>
				</div>

			</div>
			@endif
			@endforeach
		</div>
	</div>

	<div class='row'>
		
		<div class='col-md-10 col-md-offset-1 sharer' style='font-size: 1.7em; text-align: center; margin-bottom: 50px;'>
			<h3>COMPARTE</h3>
			<div class='sharer'>
				<span class="twitter">
					<a onclick="window.open('http://twitter.com/share?url={{ URL::route('showProject', array($project->id)) }}&text={{$project->title}}, por {{ $user->first_name }} {{ $user->last_name }}. Via @sens_arch.','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500')" 
						href="javascript:void(0)" title="Comparte en Twitter">
						<i class='fa fa-twitter-square'></i>
					</a>
				</span>
				<span class="facebook">
					<a onclick="window.open('http://www.facebook.com/sharer.php?s=100&p[url]={{ URL::route('showProject', array($project->id)) }}','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500')" 
						href="javascript:void(0)" title="Comparte en Facebook">
						<i class='fa fa-facebook-square'></i>
					</a>
				</span>
				<span class="google">
					<a onclick="window.open('https://plus.google.com/share?url={{ URL::route('showProject', array($project->id)) }}','targetWindow',
						'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500')" 
						href="javascript:void(0)" title="Comparte en Google+">
						<i class='fa fa-google-plus-square'></i>
					</a>
				</span>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')
@overwrite	