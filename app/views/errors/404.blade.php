@extends('layouts.layout')

@section('content')
<div class='grey-bg'>
	<div id='page-not-found' class='container'>
		<div class='row'>
			<div class='text-not-found'>
				<h1>Oops</h1>
				<h2>this page can't be found!</h2>
			</div>
			{{ HTML::image('img/404.png') }}
		</div>

	</div>
</div>
@stop