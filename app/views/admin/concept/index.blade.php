@extends('admin.layout')

@section('sidebar')
	<ul class="nav nav-pills nav-stacked">
		<li>
			<a href="{{ URL::route('adminAddConcept') }}">
				<i class="fa fa-plus"></i>
				Añadir concursos
			</a>
		</li>
	</ul>
@stop

@section('content')
<div class='panel panel-default'>
	<div class='panel-heading'>Concursos</div>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		@foreach($concepts as $concept)
			<tr>
				<td>{{$concept->id}}</td>
				<td>{{$concept->title}}</td>
				<td>
					<a href="{{ URL::route('adminEditConcept', $concept->id) }}">
						<i class='fa fa-edit'></i>
						Editar
					</a>
				</td>
			</tr>
		@endforeach
	</table>
</div>
@stop