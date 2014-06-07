@extends('layouts.layout')

@section('includes')
{{ HTML::style('packages/lightbox/css/lightbox.css') }}
{{ HTML::script('packages/lightbox/js/lightbox.min.js') }}
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

@section('content')

<div class='container'>
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
</div>
@stop