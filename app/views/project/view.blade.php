@extends('layouts.layout')

@section('cover_image')
<div id='cover_picture'>
	<img src="http://upload.wikimedia.org/wikipedia/commons/6/6f/Disney_Concert_Hall_by_Carol_Highsmith.jpg">
</div>
@stop

@section('content')
<div id='project_page'>
	<center>
		<h1>{{ $project-> title }} <small>a {{ $project->city }}</small></h1>
		<h2><small>NOM i COGNOM al ANY</small></h2>
	</center>
	
	<div class='row'>
		<div class='col-md-8 col-md-offset-2 description'>

			{{ $project->description }}
		</div>
	</div>
	<div class='row'>
		@foreach ($project->images as $index => $image)
			@if($index%4 == 0)
				</div>
				<div class='row'>
					<div class='col-md-1'></div>
			@endif

			@if($image->img_type == 'normal')
				<div class='col-md-2 col-md-offset-1'>
					<a data-lightbox="{{$image->filename}}" href="/sensarch/public/uploads/{{ $image->filename }}">
						<img class='img_project' src="/sensarch/public/uploads/{{ $image->filename }}">
					</a>
				</div>
			@endif
		@endforeach
	</div>
</div>
@stop