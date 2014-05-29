@extends('layouts.layout')

@section('content')

<div class='container'>
	<div class='col-md-3'>
		<div id='beta_home'>
			<span id='beta'>BETA</span>
			<p style='text-align: left;'>
				<i>
					Si tienes dudas, comentarios, sugerencias... háznoslo saber en
					<a href="mailto:info@sensarch.com">info@sensarch.com</a>
				</i>
			</p>
		</div>
	</div>

	<div class='col-md-9'>
		@foreach($projects as $index => $project)
			@include('blocks.project', array('project' => $project, 'user' => User::find($project->author_id)))
		@endforeach
	</div>
</div>
@stop