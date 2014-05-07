<div class='project'>
	<a href="/sensarch/public/project/{{$project->id}}">
		<div>
			{{ HTML::image('img/projects/thumb.jpg') }}
		</div>
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