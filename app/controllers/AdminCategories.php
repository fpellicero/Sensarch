<?php

class AdminCategories extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$categories = Category::all();

		return View::make('admin.category.index', array('categories' => $categories));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::has('name')) {
			$name = Input::get('name');
			if (strlen($name) < 2) {
				return Redirect::back();
			}

			$category = new Category();
			$category->name = $name;

			$category->save();
		}
		
		return Redirect::back();
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
		$concept = Concept::find($id);

		return View::make('admin/concept/edit', array('concept' => $concept));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$concept = Concept::find($id);

		$concept->title = Input::get('title');
		$concept->delivery_date = Input::get('delivery_date');
		$concept->register_date = Input::get('register_date');
		$concept->city = Input::get('city');
		$concept->prize = Input::get('prize');
		$concept->url = Input::get('url');

		$concept->save();

		$file = Input::file('img');
		if ($file) {

			$destinationPath = 'concepts/' . $concept->id . '/';
			$filename = $concept->id . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);

			$img = new Image();
			$img->filename = $filename;
			$img->project_id = $concept->id;
			$img->img_type = 'concept';
			$img->save();

			$concept->img_id = $img->id;
			$concept->save();
		}
		
		if (Input::get('languages')) {
			$concept->languages()->sync(Input::get('languages'));
		}

		if (Input::get('categories')) {
			$concept->categories()->sync(Input::get('categories'));
		}

		return Redirect::back();
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
