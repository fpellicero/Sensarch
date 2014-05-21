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
		
		$projects = $user->projects();
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
		$user = User::find($id);
		return View::make('user/edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		$user->name = Input::get('name');
		$user->surname = Input::get('surname');

		if(Input::file('profile_pic') != NULL ) {
			
			$file = Input::file('profile_pic');

			$destinationPath = 'uploads';
			$filename = uniqid(md5_file($file->getRealPath())) . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);

			$img_home = new Image();
			$img_home->filename = $filename;
			$img_home->project_id = 0;
			$img_home->img_type = 'profile';
			$img_home->save();

			$user->profile_pic = $img_home->id;
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
