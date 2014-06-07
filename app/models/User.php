<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {

	/*
	 * Relations
	 */
	public function projects()
	{
		return $this->hasMany('Project', 'author_id');
	}

	public function languages()
	{
		return $this->belongsToMany('Language');
	}


	/*
	 * Check if user likes project with id = $id
	 */
	public function likesProject($id)
	{
		$like = DB::table('likes')->where('project_id', '=', $id)->count();

		if ($like > 0) {
			return true;
		}else {
			return false;
		}
	}


	/*
	 * TO-DO: Delete these and access by attr name
	 */
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