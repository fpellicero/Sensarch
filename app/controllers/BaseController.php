<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (Auth::check()) {
			$user = Auth::user();
		}else {
			$user = null;
		}
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout)->with('user', $user);
		}
	}

	public function termsPage()
	{
		return View::make('pages.terms');
	}

}