@extends('layouts.layout')

@section('content')
<div class='row'>
	@foreach ($projects as $index => $project)
	<div class='col-md-4 col-sm-6'>
		<div class='project'>
			<a href="project/{{$project->id}}">
				<img class='img_project_home' src="img/projects/thumb.jpg">
				<div class='project_block_text'>
					<h3>
						{{ $project->title }} <small>de FRANCESC PELLICERO</small>
					</h3>
					<div>
						{{ substr($project->description,0,255) }}
					</div>
				</div>
			</a>
		</div>
	</div>
	@endforeach
</div>
@stop