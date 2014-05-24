@extends('layouts.layout')

@section('includes')
{{ HTML::script('js/edit_profile.js') }}
@stop

@section('content')
<form method='post' enctype="multipart/form-data">
	<div id='user_info_wrapper'>
		<div id='profile_img'>
			{{ HTML::image($user->getProfilePicURL()) }}
			<a href='#'>Cambiar</a>
		</div>
		<div id='user_info'>
			<br>
			<button type="submit" class='btn btn-success' style='float:right; margin-right: 10px;'>
				<span class="glyphicon glyphicon-floppy-disk"></span>
				Save
			</button>
			<div class='form-group form-inline'>
				<input type='text' class='form-control' name='name' value="{{$user->name}}">
				<input type='text' class='form-control' name='surname' value="{{$user->surname}}">
			</div>
			<input id='profile_pic_control' type='file' style='display: none' onchange="PreviewImage();" name='profile_pic'>
		</div>
	</div>
</form>

@stop