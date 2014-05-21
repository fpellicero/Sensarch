<div class='project_old'>
	<div class='project_cover_old'>
		<a href="{{ URL::route('showProject', $project->id) }}">
			<img class='project_cover_old' src="http://upload.wikimedia.org/wikipedia/commons/6/6f/Disney_Concert_Hall_by_Carol_Highsmith.jpg">
		</a>
	</div>
	<div class='project_info_old'>
		<h2>
			<a href="{{ URL::route('showProject', $project->id) }}">
				{{ $project->title }}
			</a>
			<br>
			<small>{{ $project->city }}</small>
		</h2>

		<p>
			{{ substr($project->description,0,400) }}...
		</div>

	</div>
