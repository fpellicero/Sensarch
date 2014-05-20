<?php

class LoginController extends BaseController {

	
	public function loginPage()
	{
		return View::make('login');
	}

	public function loginAttempt()
	{
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
			
			Sentry::register($user, true);

			$credentials = array(
				'email' => $user['email'],
				'password' => $user['password']
			);

			if (Sentry::authenticate($credentials, false)) {
				return Redirect::route('home');
			}
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User with this login already exists.';
		}
	}

}