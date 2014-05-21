@extends('layouts.layout')

@section('content')
	<div class='container'>
		<div class='col-md-2'>
			<span id='beta'>
				<center>
					BETA
				</center>
			</span>
		</div>

		<div class='col-md-9 col-md-offset-1'>
			@foreach($projects as $index => $project)
				@include('blocks.project', array('project' => $project, 'user' => User::find($project->author_id)))
			@endforeach
		</div>
	</div>
@stop