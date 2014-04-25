@extends('layouts.layout')

@section('content')
	<h1>Crear nou projecte</h1>
	<form method='post'>
		<div class='form-group'>
			<label for='title'>Títol del projecte</label>
			<input type='text' class='form-control' name='title'>
		</div>

		<div class='form-group'>
			<label for='city'>Ciutat</label>
			<input type='text' class='form-control' name='city'>
		</div>

		<div class='form-group'>
			<label for='description'>Descripció</label>
			<textarea class='form-control' rows='5' name='description'></textarea>
		</div>

		<button type='submit' class='btn btn-primary'>Crear!</button>

	</form>
@stop