<div class='project'>
	<a href="{{ URL::route('showProject', $project->id) }}">
		<div>
			{{ HTML::image('img/projects/thumb.jpg') }}
		</div>
	</a>
		<div class='project_block_text'>
			
			<h3>
				{{ $project->title }} <small>de 
				<a href="{{ URL::route('userProfile', $project->author_id) }}">
					{{ User::find($project->author_id)->name }} {{User::find($project->author_id)->surname }}</small>
				</a>
			</h3>
			<div>
				{{ substr($project->description,0,255) }}...
			</div>
		</div>
</div>
