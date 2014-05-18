@extends('layouts.layout')

@section('includes')
{{ HTML::script('js/edit_project.js') }}
@stop

@section('header')
	@include('layouts.sections.header_transparent')
@overwrite

@section('cover_image')
<div id='cover_picture'>
	<img src="http://upload.wikimedia.org/wikipedia/commons/6/6f/Disney_Concert_Hall_by_Carol_Highsmith.jpg">
	<a href="#">Cambiar</a>
</div>
<div id='cover_picture_spacer'></div>
@stop

@section('content')
<form method='post' enctype="multipart/form-data">
	<div class='container'>
		<button type="submit" class="btn btn-success" style='float: right;'><i class='fa fa-save'></i> Crear</button>
		<div class='row'>
			<div class='col-md-6 col-md-offset-3'>
				<center>
					<div class='form-group'>
						<h1>
							<input type='text' class='form-control' name='title' placeholder='Títol' >					
						</h1>
					</div>
					<div class='form-group form-inline'>
						<h2>
							<small>
								<strong>Francesc Pellicero</strong> en  
								<input type='text' class='form-control' name='city' placeholder='Ciutat'>
							</small>
						</h2>
					</div>
				</center>
			</div>
		</div>

		<div class='row'>
			<div class='col-md-8 col-md-offset-2 description'>
				<br>
				<textarea rows='15' placeholder='Description' name='description'></textarea>
				<div class='form-group'>
					<br><br>
					<label>Imatges</label>
					<input id='images' class='form-control' type="file" name="images[]" multiple>
				</div>
			</div>
		</div>
		<div class='row' id='images_wrapper'>

		</div>
	</div>
	<input id='cover_file' class='form-control hidden' type="file" name="img_home">

</div>
</form>
@stop