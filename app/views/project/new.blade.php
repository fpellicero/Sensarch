@extends('layouts.layout')

@section('content')
	<h1>Crear nou projecte</h1>
	<form method='post' enctype="multipart/form-data">
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
			<textarea class='form-control' rows='5' name='description' id='description'></textarea>
				<script type="text/javascript">CKEDITOR.replace('description')</script>
		</div>

		<div class='form-group'>
				<label for='img_home'>Imatge a la portada</label>
				<input class='form-control' type="file" name="img_home">
			</div>

			<div class='form-group'>
				<label for='images'>Imatges</label>
				<input class='form-control' type="file" name="images[]" multiple='1'>
			</div>


		<button type='submit' class='btn btn-primary'>Crear!</button>

	</form>
@stop