<?php

class HomeController extends BaseController {

	public function homePage()
	{
		if (!Sentry::check() && Session::get('newcomer', true)) {
			return Redirect::route('login');	
		}
		$projects = Project::orderBy('created_at', 'DESC')->get();
		return View::make('home')->with('projects', $projects);
	}

}