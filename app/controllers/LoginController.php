<?php

class LoginController extends BaseController {

	
	public function loginPage()
	{
		Session::put('newcomer', false);
		return View::make('login');
	}

	public function professionalLoginPage()
	{
		return View::make('login_professional');
	}

	public function loginAttempt()
	{
		$rules = array(
			'email' => 'Required',
			'password' => 'Required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::route('login')->withErrors($validator);
		}

		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
			);

		if (Sentry::authenticate($user)) {
			return Redirect::route('home')
					->with('flash_notice', 'You are successfully logged in.');
		}

        // authentication failure! lets go back to the login page
		return Redirect::route('login')
					->with('flash_error', 'Your username/password combination was incorrect.')
					->withInput();
	}

	public function logout()
	{
		Sentry::logout();

		return Redirect::route('login')
			->with('flash_notice', 'You are successfully logged out.');
	}

	public function register()
	{
		try {
			$user = array();

			$user['first_name'] = Input::get('first_name');
			$user['last_name'] = Input::get('last_name');

			$user['email'] = Input::get('email');
			$user['password'] = Input::get('password');

			$user['type'] = 'personal';			
			
			Sentry::register($user, true);

			Mail::queue('emails.welcome', array('user' => $user), function ($message) use ($user) {
				$message->to($user['email'])->subject('Bienvenido a Sensarch!');
			});

			if (Sentry::authenticate($user)) {
				$user = Sentry::getUser();
				return Response::json(array('user_id' => $user->id, 'name' => $user->first_name . ' ' . $user->last_name), 201);
			}

		}
		catch (Exception $e)
		{
			return Response::json('', 500);
		}
	}

	public function registerProfessional()
	{
		try {
			$user = array();

			$user['email'] = Input::get('email');
			$user['password'] = Input::get('password');
			$user['type'] = 'professional';
			
			Sentry::register($user, true);

			if (Sentry::authenticate($user)) {
				$user = Sentry::getUser();

				return Response::json(array('user_id' => $user->id), 201);
			}

		}
		catch (Exception $e)
		{
			return Response::json($e->getMessage, 500);
		}
	}

}