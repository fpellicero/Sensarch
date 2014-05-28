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
			'user_id' => 'Required',
			'description' => 'Required',
			'img_home' => 'Required'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Response::json('404');
		}

		$project = new Project;

		$project->title = Input::get('title');
		$project->description = Input::get('description');
		$project->city = Input::get('city');
		$project->author_id = Input::get('user_id');
		$project->save();


		/*
		 * Saving new image
		 */
		$file = file_get_contents(Input::get('img_home'));
		$path = public_path() . '/projects/' . $project->id . '/';
		$filename = uniqid() . '.png'; 

		File::makeDirectory('projects/' . $project->id);
		file_put_contents($path . $filename, $file);

		$img_home = new Image();
		$img_home->filename = $filename;
		$img_home->project_id = $project->id;
		$img_home->img_type = 'cover';
		$img_home->save();

		$project->img_home = $img_home->id;
		$project->save();

		$images = Input::get('images');
		if (count($images) > 0) {
			foreach ($images as $image) {

				$image = file_get_contents($image);
				$path = public_path() . '/projects/' . $project->id . '/';
				$filename = uniqid() . '.png';

				file_put_contents($path . $filename, $image);

				$img = new Image();
				$img->filename = $filename;
				$img->project_id = $project->id;
				$img->img_type = 'normal';
				$img->save();		
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
		return View::make('project/view', array('project' => $project, 'user' => $user));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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


}
