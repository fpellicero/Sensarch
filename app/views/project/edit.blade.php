@extends('layouts.layout')

@section('includes')
{{ HTML::script('js/edit_project.js') }}
@stop

@section('header')
@include('layouts.sections.header_transparent')
@overwrite

@section('cover_image')
<div id='cover_picture'>
	<a href="javascript::void(0)">
		<div class='add_pic_message'>
			<i class="fa fa-camera"></i><br>
			Cambiar
		</div>
	</a>
	<img src="{{ $project->getCoverImgURL() }}" id='img_home'>
</div>
<div id='cover_picture_spacer'></div>
@stop

@section('content')
{{ Form::model($project, array('url' => "project/$project->id", 'files' => 'true', 'id' => 'edit-project', 'class' => 'form-horizontal')) }}
<div class='container'>
	@if (Session::has('errors'))
	<div class="alert alert-danger">
		<ul>
			{{ implode('', $errors->all('<li>:message</li>')) }}
		</ul>
	</div>
	@endif
	<button type="submit" class="btn btn-success" style='float: right;'><i class='fa fa-save'></i> Guardar</button>
	<div class='row'>
		<div class='col-md-6 col-md-offset-3'>
			<center>
				<div id='title_form' class='form-group'>
					{{ Form::text('title', NULL,array('id' => 'title', 'class' => 'form-control')) }}
				</div>
				<div id='city_form' class='form-group form-inline'>
					<h2>
						<small>
							<strong>
								{{Sentry::getUser()->getFirstName()}} {{Sentry::getUser()->getLastName()}}
							</strong> en  
							{{ Form::text('city', NULL, array('id' => 'city', 'class' => 'form-control')) }}
						</small>
					</h2>
				</center>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-4 col-md-offset-4'>
				<div class='form-group'>
					<label for='private'>
						<i class="fa fa-lock" style='font-size: 0.8em; color: #999;'></i>
						Visibilidad del proyecto:
					</label>
					{{ Form::select('private', array('0' => 'Público', '1' => 'Privado'), NULL, array('id' => 'private', 'class' => 'form-control')); }}
				</div>
			</div>

			<div class='col-md-4 col-md-offset-4'>
				<div class='form-group'>
					<label for="categories">Categorías del proyecto:</label>
					<select id='categories' name='categories[]' multiple class='form-control form-select'>
						@foreach($project->categories as $category)
							<option value="{{ $category->id }}" selected='selected'>{{ $category->name }}</option>
						@endforeach
						
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class='col-md-8 col-md-offset-2 description'>

				
				<div id='description_form' class='form-group'>
					{{ Form::textarea('description', NULL,array('id' => 'description', 'class' => 'form-control')) }}
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<div id='images_form' class='form-group'>
					<br><br>
					<label>Añade nuevas imágenes</label>
					<input id='images' class='form-control' type="file" name="images[]" multiple>
				</div>
			</div>
		</div>
		<div class='row'>
			<div id='images_wrapper' class='col-md-8 col-md-offset-2'>
				@foreach ($project->images as $index => $image)

				@if($image->img_type == 'normal')
				<div class='col-md-4 col-sm-6 project_page_image' id="image-{{$image->id}}">
					<div class='thumbnail'>
						<a class='link_delete' img='{{ $image->id }}' href="javascript:void(0)">
							<i class='fa fa-times-circle'></i>
						</a>
						<a data-lightbox="{{$project->title}}" href="/projects/{{ $project->id }}/{{ $image->filename }}">
							<img class='img_project' src="{{ Croppa::url('/projects/' . $project->id . '/' . $image->filename, 320, 250); }}">
						</a>
					</div>

				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<input id='cover_file' class='form-control hidden' type="file" name="img_home">
	<input id='user_id' type='hidden' value="{{Sentry::getUser()->id}}">

</div>
</form>
@stop