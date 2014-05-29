<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {

	public function projects()
	{
		return $this->hasMany('Project', 'author_id');
	}

	public function getFirstName()
	{
		return $this['attributes']['first_name'];
	}

	public function getLastName()
	{
		return $this['attributes']['last_name'];
	}

	public function getProfilePicURL()
	{
		$img = Image::find($this->profile_pic);
		if ($img) {
			return '/profiles/' . $img->filename;
		}else {
			return '/img/profile_blank.png';
		}
	}

}