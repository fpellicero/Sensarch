@foreach($projects as $index => $project)
	@include('blocks.project', array('project' => $project, 'user' => User::find($project->author_id)))
@endforeach