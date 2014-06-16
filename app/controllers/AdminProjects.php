<?php

class AdminProjects extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$projects = Project::all();

		return View::make('admin.project.index', array('projects' => $projects));
	}

	public function import()
	{
		$result = DB::select(DB::raw(
			'SELECT 
			p.id_projet,
			u.id,
			p.descripcion_projet
			FROM projectes p 
			LEFT JOIN sensarch s ON s.id = p.id_projet
			LEFT JOIN users u ON s.email = u.email')
		);

		foreach ($result as $record) {
			$project = new Project;

			$project->title = 'Barcelona Youth Hostel';
			$project->description = $record->descripcion_projet;
			$project->city = 'Barcelona, España';
			$project->author_id = $record->id;
			$project->private = true;
			$project->save();

			$project_path = 'projects/' . $project->id . '/';
			if (!File::isDirectory($project_path)) {
				File::makeDirectory($project_path);
			}

			$img = new Image();
			$img->project_id = $project->id;
			$img->img_type = 'cover';
			$img->filename = uniqid() . '.jpg';
			$img->save();

			$project->img_home = $img->id;
			$project->save();

			$from = 'old/' . $record->id_projet . '.jpg';
			$to = $project_path . $img->filename;
			File::copy($from, $to);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
