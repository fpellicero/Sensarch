<?php

class ImageController extends BaseController {

	public function store()
	{
		
		$img_type = Input::get('img_type');
		$img_data = file_get_contents(Input::get('img_data'));

		$filename = uniqid() . '.png'; 

		if (!File::isDirectory('tmp/')) {
			File::makeDirectory('tmp/');
		}

		$path = public_path() . '/tmp/';

		file_put_contents($path . $filename, $img_data);

		$img = new Image();
		$img->filename = $filename;
		$img->img_type = $img_type;
		$img->save();

		return Response::json(array('image_id' => $img->id, 'url' => '/tmp/' . $filename), 201);
	}

	public function delete($id)
	{
		$img = Image::find($id);

		/*
		 * Deleting files from disk
		 */


		$img->delete();

		return Response::json(array('id' => $id), 200);
	}

}