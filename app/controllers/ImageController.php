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

		return Response::json(array('image_id' => $img->id), 201);
	}

}