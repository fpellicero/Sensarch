<?php

class HomeController extends BaseController {

	public function homePage()
	{
		$user_id = -1;
		if (Sentry::check()) {
			$user_id = Sentry::getUser()->id;
		}
		if (!Sentry::check() && Session::get('newcomer', true)) {
			return Redirect::route('login');
		}

		$projects = Project::orderBy('created_at', 'DESC')
			->where('private', 0)
			->orWhere('author_id', $user_id)
			->take(10)
			->get();
		return View::make('home')->with('projects', $projects);
	}

	public function getProjects($offset)
	{
		$projects = Project::orderBy('created_at', 'DESC')->skip($offset)->take(10)->get();
		return View::make('ajax/projects_blocks')->with('projects', $projects);
	}

	public function email()
	{
		return View::make('emails.welcome')->with('user', Sentry::getUser());
	}

}