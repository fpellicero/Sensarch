@extends('admin.layout')

@section('sidebar')
	<ul class="nav nav-pills nav-stacked">
		<li>
			<a href="{{ URL::route('adminAddUser') }}">
				<i class="fa fa-user"></i>
				Afegir usuari
			</a>
		</li>
	</ul>
@stop

@section('content')
<div class='panel panel-default'>
	<div class='panel-heading'>Proyectos</div>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>Titol</th>
				<th>Autor</th>
				<th>Privat</th>
			</tr>
		</thead>
		@foreach($projects as $project)
			<tr>
				<td>{{$project->id}}</td>
				<td>{{$project->title}}</td>
				<td>{{$project->user->first_name}} {{$project->user->last_name}}</td>
				<td>
					@if($project->private)
						<i class="fa fa-lock"></i>
					@else
						<i class="fa fa-unlock"></i>
					@endif
				</td>
			</tr>
		@endforeach
	</table>
</div>
@stop