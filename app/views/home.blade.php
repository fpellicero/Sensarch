@extends('layouts.layout')

@section('content')
	<div class='row'>
		@foreach ($projects as $index => $project)
			<div class='col-md-3 col-sm-4'>
				<div class='project'>
					<span class='project_title'>{{ $project->title }}</span>
				</div>
			</div>
		@endforeach
	</div>
@stop