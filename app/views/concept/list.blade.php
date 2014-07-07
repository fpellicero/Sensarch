@extends('layouts.layout')

@section('includes')
	{{ HTML::script('js/home.js') }}
@stop

@section('content')

<div class='container'>
	<div class='col-md-3 hidden-sm hidden-xs'>
		<div id='beta_home'>
			<span id='beta'>BETA</span>
			<p style='text-align: left;'>
				<i>
					Si tienes dudas, comentarios, sugerencias... háznoslo saber en
					<a href="mailto:info@sensarch.com">info@sensarch.com</a>
				</i>
			</p>
		</div>
	</div>

	<div class='col-md-9'>
		<div id='concept-feed'>
			<span id='num-concepts' class='hidden'>3</span>
			
			@foreach($concepts as $index => $concept)
				@include('blocks.concept', array('concept' => $concept))
			@endforeach
		</div>
		
		<div class='load_more_block'>
			<span style='display: none;'><i class="fa fa-spin fa-refresh"></i></span>
			<a id='load_more_link' href="javascript:void(0)">
				VER MAS
			</a>
		</div>
	</div>
</div>
@stop