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
		return 'img/profile_blank.png';
	}

}