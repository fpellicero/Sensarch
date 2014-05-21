@extends('layouts.layout')

@section('content')
<div id='container'>
	@foreach ($projects as $index => $project)
	<div class='item'>
		@include('blocks.project')->with('project', $project)
	</div>
	@endforeach
</div>
@stop