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
	<div class='panel-heading'>Usuarios de Sensarch</div>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>Nom i cognom</th>
				<th>Email</th>
				<th>Activat</th>
			</tr>
		</thead>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->first_name}} {{$user->last_name}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->activated)
						<i class="fa fa-check"></i>
					@else
						<i class="fa fa-times"></i>
					@endif
				</td>
			</tr>
		@endforeach
	</table>
</div>
@stop