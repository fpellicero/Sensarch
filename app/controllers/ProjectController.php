<?php

class ProjectController extends BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('project/new');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
			'title' => 'Required',
			'city' => 'Required',
			//'user_id' => 'Required',
			'description' => 'Required',
			'img_home' => 'Required',
			'private' => 'Required'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			App::abort(500, $validator->messages());
		}

		$project = new Project;

		$project->title = Input::get('title');
		$project->description = Input::get('description');
		$project->city = Input::get('city');
		$project->author_id = Sentry::getUser()->id;
		$project->img_home = Input::get('img_home');
		$project->private = Input::get('private');
		$project->save();


		/*
		 *	Creem el directori de projecte
		 */
		$project_path = 'projects/' . $project->id . '/';
		if (!File::isDirectory($project_path)) {
			File::makeDirectory($project_path);
		}

		/*
		 * Assignem la imatge de portada
		 */
		$img_home = Image::find(Input::get('img_home'));
		$img_home->project_id = $project->id;
		$img_home->save();

		$project->img_home = $img_home->id;
		$project->save();

		File::move('tmp/' . $img_home->filename, $project_path . $img_home->filename);

		/*
		 * Guardem les imatges de projecte
		 */
		$images = Input::get('images');

		if (is_array($images)) {
			foreach ($images as $image_id) {

				$img = Image::find($image_id);
				$img->project_id = $project->id;
				$img->save();

				File::move('tmp/' . $img->filename, $project_path . $img->filename);	
			}
		}

		return Response::json(array('project_id' => $project->id), '201');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		$user = User::find($project->author_id);
		$page = Page::where('user_id', $project->author_id)->first();
		return View::make('project/view', array('project' => $project, 'user' => $user, 'page' => $page));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);

		return View::make('project/edit', array('project' => $project));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::find($id);

		$project->title = Input::get('title');
		$project->city = Input::get('city');
		$project->description = Input::get('description');
		$project->private = Input::get('private');
		$project->save();

		if (Input::has('img_home')) {
			$img_id = Input::get('img_home');

			$img_home = Image::find($img_id);
			$img_home->project_id = $id;
			$img_home->save();

			$project->img_home = $img_home->id;
			$project->save();

			$from = 'tmp/' . $img_home->filename;
			$to = 'projects/' . $id . '/' . $img_home->filename;
			File::move($from, $to);
		}

		/*
		 * Guardem les imatges de projecte noves
		 */
		$images = Input::get('images');

		if (is_array($images)) {
			foreach ($images as $image_id) {

				$img = Image::find($image_id);
				$img->project_id = $project->id;
				$img->save();

				$from = 'tmp/' . $img->filename;
				$to = 'projects/' . $id . '/' . $img->filename;
				File::move($from, $to);	
			}
		}

		/*
		 * Delete old photos
		 */
		$images = Input::get('images_delete');

		if (is_array($images)) {
			foreach ($images as $image_id) {
				$img = Image::destroy($image_id);
			}
		}



		return Response::json(array('project_id' => $project->id), '200');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = Project::find($id);

		if(Sentry::getUser()->id != $project->author_id) {
			return Redirect::route('home');
		}else {
			Project::destroy($id);
			return Redirect::route('userProfile', Sentry::getUser()->id);	
		}
		
	}

	public function like($id)
	{
		$user_id = Input::get('user_id');

		$project = Project::find($id);
		$project->likes()->attach($user_id);

		return Response::json(array('', '200'));

	}

	public function dislike($id)
	{
		$user_id = Input::get('user_id');

		$project = Project::find($id);
		$project->likes()->detach($user_id);

		return Response::json(array('', '200'));

	}



}
