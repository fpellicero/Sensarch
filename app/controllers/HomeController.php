<?php

class HomeController extends BaseController {

	public function homePage()
	{
		$projects = Project::all();
		return View::make('home')->with('projects', $projects);
	}

}