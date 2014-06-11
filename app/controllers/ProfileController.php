<?php

class ProfileController extends BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Sentry::findUserById($id);
		$projects = $user->projects->filter(function($project) use ($id) {
			if (Sentry::check() && Sentry::getUser()->id == $id) {
				return true;
			}else {
				return !$project->private;
			}
		});
		$languages = $user->languages;
		return View::make('user/view', array('user' => $user, 'projects' => $projects, 'languages' => $languages));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!Sentry::check() || Sentry::getUser()->id != $id) {
			App::abort(403, 'Unauthorized');
		}
		
		$user = Sentry::findUserById($id);
		$languages = Language::all();
		
		return View::make('user/edit', array('user' => $user, 'languages' => $languages));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!Sentry::check() || Sentry::getUser()->id != $id) {
			App::abort(403, 'Unauthorized');
		}

		/*
		 * Validate input
		 */
		$validator = Validator::make(
			Input::all(), 
			array(
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'profile_pic' => 'image',
				'password' => 'sometimes|confirmed',
				'facebook' => 'url',
				'twitter' => 'url',
				'linkedin' => 'url',
				'instagram' => 'url',
				'languages' => 'exists:languages,id'
				)
			);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		$user = User::find($id);

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');

		if (Input::has('password')) {
			$user->password = Input::get('password');
		}

		$user->current_address = Input::get('current_address');
		$user->current_job = Input::get('current_job');
		$user->past_job = Input::get('past_job');

		$user->facebook = Input::get('facebook');
		$user->twitter = Input::get('twitter');
		$user->linkedin = Input::get('linkedin');
		$user->instagram = Input::get('instagram');

		$languages = Input::get('languages');
		if (count($languages) > 0) {
			$user->languages()->sync($languages);
		}

		$file = Input::file('profile_pic');
		if ($file) {

			/*
			 * Delete the old profile picture
			 */
			$img_old = Image::find($user->profile_pic);
			if ($img_old) {
				$filepath = 'profiles/' . Image::find($user->profile_pic)->filename;
				Croppa::delete($filepath);
				Image::destroy($user->profile_pic);
			}

			$destinationPath = 'profiles';
			$filename = $user->id . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);

			$img = new Image();
			$img->filename = $filename;
			$img->project_id = 0;
			$img->img_type = 'profile';
			$img->save();

			$user->profile_pic = $img->id;
		}

		$user->save();

		return $this->show($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
