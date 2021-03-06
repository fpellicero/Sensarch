<?php

class PageController extends BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$page = Page::find($id);

		$user = User::find($page->user_id);
		$projects = $user->projects->filter(function($project) use ($page) {

			if (Sentry::check() && Sentry::getUser()->id == $page->user_id) {
				return true;
			}else {
				return !$project->private;
			}
		});

		return View::make('page/view', array('page' => $page, 'projects' => $projects));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = Page::find($id);

		if (Input::has('name')) {
			$page->name = Input::get('name');
		}

		if (!Request::ajax() && Input::file('page_img')) {
			$file = Input::file('page_img');
			if ($file) {

				$img_old = Image::find($page->page_img);
				if ($img_old) {
					$filepath = 'pages/' . Image::find($page->page_img)->filename;
					Croppa::delete($filepath);
					Image::destroy($page->page_img);
				}

				$destinationPath = 'pages/';
				$filename = $page->id . '.' . $file->getClientOriginalExtension();
				$file->move($destinationPath, $filename);

				$img = new Image();
				$img->filename = $filename;
				$img->project_id = 0;
				$img->img_type = 'page';
				$img->save();

				$page->page_img = $img->id;
			}
		}

		if (Request::ajax() && Input::get('page_img')) {
				$img = Image::find(Input::get('page_img'));
				$img->project_id = $page->id;
				$img->img_type = 'page';

				$image_name = explode('.', $img->filename);
				$destFilename = $page->id . '.' . $image_name[1];
				File::move('tmp/' . $img->filename, 'pages/' . $destFilename);
				
				$img->filename = $destFilename;
				$img->save();

				$page->page_img = $img->id;
		}
		$page->city = Input::get('city');
		$page->country = Input::get('country');
		$page->description = Input::get('description');
		$page->url = Input::get('url');
		$page->address = Input::get('address');
		$page->facebook = Input::get('facebook');
		$page->twitter = Input::get('twitter');
		$page->linkedin = Input::get('linkedin');
		$page->type = Input::get('page_type');

		$page->save();

		if (Request::ajax()) {
			return Response::json('', 200);
		}else {
			return Redirect::route('showPage', $page->id);
		}
	}

	public function store()
	{
		$page = new Page;

		$page->name = Input::get('name');
		$page->user_id = (int) Input::get('user_id');
		$page->save();

		return Response::json(array('page_id' => $page->id), 201);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::find($id);
		
		return View::make('page/edit', array('page' => $page));
		
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
