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
		$projects = $user->projects->sortBy(function($project) {
			return !$project->created_at;
		});
		return View::make('user/view', array('user' => $user, 'projects' => $projects));
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
		$projects = $user->projects->sortBy(function($project) {
			return !$project->created_at;
		});
		return View::make('user/edit', array('user' => $user, 'projects' => $projects));
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

		$user = User::find($id);

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');

		if(Input::file('profile_pic') != NULL ) {

			/*
			 * Delete the old profile picture
			 */
			if ($user->profile_pic != 0) {
				$filepath = public_path() . '/profiles/' . Image::find($user->profile_pic)->filename;
				File::delete($filepath);
				Image::destroy($user->profile_pic);
			}
			
			
			/*
			 * Stores the new one and assign to user
			 */
			$file = Input::file('profile_pic');

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
