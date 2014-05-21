<div class='project_old'>
	<div class='project_cover_old'>
		<a href="{{ URL::route('showProject', $project->id) }}">
			<img class='project_cover_old' src="{{ $project->getCoverImgURL() }}">
		</a>
	</div>
	<div class='project_info_old'>
		<h2>
			<a href="{{ URL::route('showProject', $project->id) }}">
				{{ $project->title }}
			</a>
			<br>
			<small>
				@if($user)
					<a href="{{ URL::route('userProfile', $user->id) }}">
						<strong>{{ $user->getFirstName() }} {{ $user->getLastName() }}</strong>
					</a> en
				@endif
				{{ $project->city }}
			</small>
		</h2>

		<p>
			{{ substr($project->description,0,400) }}...
		</div>

	</div>
