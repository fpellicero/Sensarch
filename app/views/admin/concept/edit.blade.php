@extends('admin.layout')

@section('content')
<div class='panel panel-default'>
	<div class='panel-heading'>Añadir proyecto</div>
	<style type="text/css">
	form {
		padding: 20px;
	}
	</style>
	{{ Form::model($concept, array('role' => 'form', 'files' => 'true')) }}


	<div class='form-group col-md-6'>
		<label for='title'>
			Nombre
		</label>
		{{ Form::text('title', NULL, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='url'>
			URL
		</label>
		{{ Form::text('url', NULL, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='delivery_date'>
			Fecha de entrega
		</label>
		{{ Form::input('date', 'delivery_date', null, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='register_date'>
			Fecha de inscripción	
		</label>
		{{ Form::input('date', 'register_date', null, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='prize'>
			Premio
		</label>
		{{ Form::text('prize', null, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='city'>
			Localización
		</label>
		{{ Form::text('city', null, array('class' => 'form-control')) }}
	</div>

	<div class='form-group col-md-6'>
		<label for='languages'>
			Idioma
		</label>
		<select id='languages' name='languages[]' multiple class='form-control form-select'>
			@foreach(Language::all() as $language)
			<option value="{{ $language->id }}">{{ $language->name }}</option>
			@endforeach
		</select>
	</div>


	<div class='form-group col-md-6'>
		<label for="categories">Categorías:</label>
		<select id='categories' name='categories[]' multiple class='form-control form-select'>
			@foreach(Category::all() as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>

	<div class='form-group col-md-12'>
		<label for='img'>
			Imagen
		</label>
		{{ Form::file('img', array('class' => 'form-control')) }}
	</div>
	<center>
		{{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
	</center>

	{{ Form::close() }}
</div>
@stop