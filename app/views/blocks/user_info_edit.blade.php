<form method='post' enctype="multipart/form-data">
	<div id='profile_img_old'>
		<a href="javascript::void(0)">
			<span class='glyphicon glyphicon-pencil'></span>
			Cambiar
		</a>
		{{ HTML::image(Croppa::url($user->getProfilePicURL(),250),'profile_picture', array('class' => 'img-circle')) }}
	</div>

	<div id='profile_info_old' class='form-group form-inline'>
		<p>
			<input type='text' class='form-control' name='first_name' placeholder='Nombre' value="{{ $user->getFirstName() }}">

			<input type='text' class='form-control' name='last_name' placeholder='Apellido' value="{{ $user->getLastName() }}">
		</p>
	</div>
	<button class='btn btn-success' type='submit'>Save</button>
	<input id='profile_pic_control' type='file' style='display: none' name='profile_pic'>
</form>
