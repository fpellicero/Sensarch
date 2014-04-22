<?php

class HomeController extends BaseController {

	public function homePage()
	{
		return View::make('home');
	}

}