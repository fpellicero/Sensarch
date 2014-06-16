<div class='project_old'>
	<div class='project_cover_old'>
		<a href="{{ URL::route('showProject', $project->id) }}" target='_blank'>
			<i class="fa fa-refresh fa-spin"></i>
			<img class='project_cover_old' src="{{ Croppa::url($project->getCoverImgURL(), 825, 300,  array('quadrant' => 'C'))  }}">
		</a>
	</div>
	<div class='project_info_old'>
		
		<div class='contextual'>
			<div class='likes'>
				<span id="like-{{$project->id}}" class='count'>{{ count($project->likes) }}</span>
				@if(Sentry::check() && Sentry::getUser()->likesProject($project->id))
				<div project-id="{{$project->id}}" class='heart img-circle dislike active'>
					<i class="fa fa-heart-o"></i>
				</div>
				@elseif (Sentry::check())
				<div project-id="{{$project->id}}" class='heart img-circle like active'>
					<i class="fa fa-heart-o"></i>
				</div>
				@else
				<div class='heart img-circle'>
					<i class="fa fa-heart-o"></i>
				</div>
				@endif
			</div>
		</div>

		<h2>
			<a href="{{ URL::route('showProject', $project->id) }}">
				@if($project->private)
					<i class="fa fa-lock" style='font-size: 0.8em; color: #DFDFDF;'></i>
				@endif
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
				{{ substr($project->description,0,240) }}...
			</div>

			<a class='project_more_info' href="{{ URL::route('showProject', $project->id) }}">Leer más</a>
		</div>
	</div>
