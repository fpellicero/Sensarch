@extends('layouts.layout')

@section('includes')
	{{ HTML::script('js/home.js') }}
@stop

@section('content')

<div class='container'>
	<div class='col-md-3 hidden-sm hidden-xs'>
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
		<div id='project-feed'>
			<span id='num-projects' class='hidden'>3</span>
			@foreach($projects as $index => $project)
				@include('blocks.project', array('project' => $project, 'user' => User::find($project->author_id), 'page' => Page::where('user_id', $project->author_id)->first()))
			@endforeach
		</div>
		
		<div class='load_more_block'>
			<span style='display: none;'><i class="fa fa-spin fa-refresh"></i></span>
			<a id='load_more_link' href="javascript:void(0)">
				VER MAS
			</a>
		</div>
	</div>
</div>
@stop