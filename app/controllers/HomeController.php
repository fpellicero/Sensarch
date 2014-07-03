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
			->where('deleted_at', NULL)
			->orWhere('author_id', $user_id)
			->take(5)
			->get();
		return View::make('home')->with('projects', $projects);
	}

	public function getProjects($offset, $user_id)
	{
		$projects = Project::orderBy('created_at', 'DESC')
			->where('private', 0)
			->orWhere('author_id', $user_id)
			->skip($offset)
			->take(5)
			->get();
		return View::make('ajax/projects_blocks')->with('projects', $projects);
	}

	public function email()
	{
		return View::make('emails.welcome')->with('user', Sentry::getUser());
	}

}