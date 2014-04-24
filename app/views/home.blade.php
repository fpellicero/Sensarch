@extends('layouts.layout')

@section('content')
	<div class='row'>
		@foreach ($projects as $index => $project)
			@if ($index % 5 != 0) 
				<div class="col-md-1"></div>
			@endif
			<div class = 'col-md-2 project'>
				<div class='project_title'>{{ $project->title }}</div>
			</div>
		@endforeach
	</div>
@stop