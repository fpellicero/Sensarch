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
	<img src="{{ $project->getCoverImgURL() }}">
</div>
<div id='cover_picture_spacer'></div>
@stop

@section('content')

<div class='container'>
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
		@foreach ($project->images as $index => $image)

			@if($image->img_type == 'normal')
				<div class='col-md-4 col-sm-6 project_page_image'>
					<a class='thumbnail' data-lightbox="{{$project->title}}" href="/sensarch/public/uploads/{{ $image->filename }}">
						<img class='img_project' src="/sensarch/public/uploads/{{ $image->filename }}">
					</a>
				</div>
			@endif
		@endforeach
	</div>
</div>
@stop