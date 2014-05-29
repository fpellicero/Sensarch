<div class='project_old'>
	<div class='project_cover_old'>
		<a href="{{ URL::route('showProject', $project->id) }}">
			<i class="fa fa-refresh fa-spin"></i>
			<img class='project_cover_old' src="{{ Croppa::url($project->getCoverImgURL(), 825, 300,  array('quadrant' => 'C'))  }}">
		</a>
	</div>
	<div class='project_info_old'>
		<h2>
			<a href="{{ URL::route('showProject', $project->id) }}">
				{{ $project->title }}
			</a>
		</h2>			
		@if($user)
		<span class='project_author'>
			<i>
				<a href="{{ URL::route('userProfile', $user->id) }}">
					{{$user->getFirstName()}} {{$user->getLastName()}}</a> en
			</i>
		@endif
		<i>
			{{ $project->city }}
		</i>
		</span>

		<div class='project_description'>
			{{ substr($project->description,0,400) }}...
		</div>

		<a class='project_more_info' href="{{ URL::route('showProject', $project->id) }}">Leer más</a>
	</div>
</div>
