@extends('layouts.layout')

@section('includes')
	{{ HTML::script('js/concepts_search.js') }}
@stop

@section('content')

<div class='container'>
	<div class='col-md-3 hidden-sm hidden-xs' style='padding-top: 25px;'>
			<form>
				<div class="input-group">
					<span class="input-group-addon">
						<i class='fa fa-search'></i>
					</span>
					<input id='search_query' type="text" class="form-control" placeholder="Busca...">
				</div>

				<h3>¿Que tipo de proyecto?</h3>

				<div id='categories'>
					@foreach(Category::all() as $category)
					{{ Form::checkbox('categories[]', $category->id) }} {{ $category->name }}<BR>
					@endforeach
				</div>

				<h3>¿Qué idiomas?</h3>
				<div id='languages'>
					@foreach(Language::all() as $language)
						{{Form::checkbox('languages[]', $language->id) }} {{ $language->name }}<br>
					@endforeach
				</div>

				<h3>¿Que rango de premios queremos?</h3>
				<input type="text" id="amount" readonly style="border: 0; text-align: center; background: none; width: 100%;">
				<div id="slider-range"></div>
				<br>
				<div style='text-align: right;'>
					<input type='submit' class='btn btn-primary' style='align: right;' value='Buscar'>
				</div>

			</form>
	</div>

	<div class='col-md-9'>
		<h1>Encuentra tu concurso profesional</h1>
		<p>Desde aquí podrás filtrar todos los concursos para que se adapten al máximo al perfil de vuestro despacho</p>
		<span id='num-concepts' class='hidden'>3</span>
		<div id='no_results' class='hidden'>
			<center>
				<i class='fa fa-building-o'></i><br>
				No hay resultados
			</center>
		</div>
		<div id='concept-feed' style='margin: 0px 15px;'>
			@foreach($concepts as $index => $concept)
				@include('blocks.concept', array('concept' => $concept))
			@endforeach
		</div>
	</div>
</div>
@stop