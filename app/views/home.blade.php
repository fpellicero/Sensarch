@extends('layouts.layout')

@section('content')
<div class='row'>
	@foreach ($projects as $index => $project)
	<div class='col-md-4 col-sm-6'>
		@include('blocks.project')->with('project', $project)
	</div>
	@endforeach
</div>
@stop