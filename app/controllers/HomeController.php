<?php

class HomeController extends BaseController {

	public function homePage()
	{
		$projects = Project::all();
		echo "<pre>";
		var_dump($projects);
		echo "</pre>";
		return View::make('home');
	}

}