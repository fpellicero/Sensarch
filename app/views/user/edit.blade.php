@extends('layouts.layout')

@section('content')

@section('content')
<form method='post'>
	<div id='user_info_wrapper'>
		<div id='profile_img'>
			{{ HTML::image('img/profile_blank.jpg') }}
		</div>
		<div id='user_info'>
			<br>
			<div class='form-group form-inline'>
				<input type='text' class='form-control' name='name' value="{{$user->name}}">
				<input type='text' class='form-control' name='surname' value="{{$user->surname}}">
			</div>
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>

@stop