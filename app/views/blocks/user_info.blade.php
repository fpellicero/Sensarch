@if(Sentry::check() && Sentry::getUser()->id == $user->id)
<a id='edit_profile_link' href="{{URL::action('editUserProfile',array($user->id))}}">
	<span class='glyphicon glyphicon-pencil'></span>
	Editar
</a>
@endif
<div id='profile_img_old'>
	{{ HTML::image($user->getProfilePicURL(),'profile_picture', array('class' => 'img-circle')) }}
</div>

<div id='profile_info_old'>
	<p>
		{{ $user->getFirstName() }}
		{{ $user->getLastName() }}
	</p>
</div>