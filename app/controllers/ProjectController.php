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
			'description' => 'Required',
			'img_home' => 'Required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('newProject')->withInput()->withErrors($validator);
		}

		$project = new Project;

		$project->title = Input::get('title');
		$project->description = Input::get('description');
		$project->city = Input::get('city');
		$project->author_id = Sentry::getUser()->id;
		$project->save();

		$file = Input::file('img_home');

		$destinationPath = 'uploads';
		$filename = uniqid(md5_file($file->getRealPath())) . '.' . $file->getClientOriginalExtension();
		$file->move($destinationPath, $filename);

		$img_home = new Image();
		$img_home->filename = $filename;
		$img_home->project_id = $project->id;
		$img_home->img_type = 'cover';
		$img_home->save();

		$project->img_home = $img_home->id;
		$project->save();


		foreach (Input::file('images') as $file) {

			$destinationPath = 'uploads';
			$filename = uniqid(md5_file($file->getRealPath())) . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);

			$img = new Image();
			$img->filename = $filename;
			$img->project_id = $project->id;
			$img->img_type = 'normal';
			$img->save();
		}

		return Redirect::to('project/new')->with('flash_notice', 'El projecte s\'ha creat correctament!');
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
		//
	}


}
