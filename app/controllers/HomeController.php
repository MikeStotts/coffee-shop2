<?php

class HomeController extends \BaseController {

	/**
	 * Display the home page
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home.index');
	}

}
