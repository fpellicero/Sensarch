<?php

class HomeController extends BaseController {

	public function homePage()
	{
		if (!Sentry::check() && Session::get('newcomer', true)) {
			return Redirect::route('login');	
		}

		$projects = Project::orderBy('created_at', 'DESC')->take(10)->get();
		return View::make('home')->with('projects', $projects);
	}

	public function getProjects($offset)
	{
		$projects = Project::orderBy('created_at', 'DESC')->skip($offset)->take(10)->get();
		return View::make('ajax/projects_blocks')->with('projects', $projects);
	}

}