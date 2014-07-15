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
	<div class='panel-heading'>Categorias</div>
	<div class='col-md-6'>
		<br>
		{{ Form::open(array('url' => 'admin/categories/new'))}}
			{{ Form::label('name', 'Añade una categoria') }}
			{{ Form::text('name', NULL, array('class' => 'form-control')) }}
		{{ Form::close()}}
	</div>
	
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
			</tr>
		</thead>
		@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
			</tr>
		@endforeach
	</table>
</div>
@stop