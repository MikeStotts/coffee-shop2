<?php

// Controller for login process resource
class LoginController extends \BaseController {

	/**
	 * Display the login form
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("login");
	}


	/**
	 * Process login form
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate input form, username and password required
		$rules = array('username' => 'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator ->fails()) {
			return Redirect::route('login.index')->withErrors($validator);           
		}
		
		// Check for registered user and correct password
		$auth = Auth::attempt([
				'username' => Input::get('username'),
				'password' => Input::get('password')
				], Input::get('remember'));
		
		if (!$auth) {
			return Redirect::route('login.index')
				->withErrors(['Invalid credentials were provided']);
		}
		
		return Redirect::to('/home')
				->with(['message' => 'Login successful']); 
	}

}
