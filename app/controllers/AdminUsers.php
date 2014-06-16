<?php

class AdminUsers extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('admin.user.index', array('users' => $users));
	}

	public function import()
	{
		$result = DB::table('sensarch')->get();
		foreach ($result as $record) {

			$user['email'] = $record->email;
			$user['password'] = uniqid();

			$user['first_name'] = $record->nombre;
			$user['last_name'] = $record->apellidos;

			$user['current_job'] = 'Estudiante en ' . $record->anterior_empresa;
			$user['past_job'] = 'Participante en Archallenge';

			$user['current_address'] = $record->ciudad . ', ' . $record->pais;

			Sentry::register($user);
		}
	}


	public function activate($id, $auth_code) {
		/*
		 * Validate input
		 */
		$validator = Validator::make(
			Input::all(), 
			array(
				'password' => 'required|confirmed'
				)
		);

		if ($validator->fails()) {
			return Redirect::back()->withErrors(array('Las contraseñas no coinciden'));
		}

		$user = Sentry::findUserById($id);

		if ($user->attemptActivation($auth_code)) {
			$password_reset = $user->getResetPasswordCode();

			$user->attemptResetPassword($password_reset, $password);

			return Redirect::to('editUserProfile', array($id));
			
		}else {
			return Redirect::back()->withErrors(array('Código de activación erroneo. Por favor contacte con nosotros en info@sensarch.com.'));
		}
	}

	public function activate_form($id, $auth_code) {
		$user = Sentry::findUserById($id);

		return View::make('admin.user.activate', array('user' => $user, 'auth_code'=> $auth_code));
	}

	public function activation_email($id) {
		$user = User::find($id);
		if (!$user->activation_code) {
			$user->getActivationCode();
		}

		Mail::send('emails.activate', array('user' => $user), function ($message) use ($user) {
			$message->to($user->email)->subject('Exposición digital BYH Archallenge');
		});

		return View::make('emails.activate', array('user' => $user));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.new');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
