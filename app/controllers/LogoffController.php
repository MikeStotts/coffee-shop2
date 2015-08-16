<?php

// Controller for logoff process resource
class LogoffController extends \BaseController {

	/**
	 * Process logoff
	 *
	 * @return Response
	 */
	public function index()
	{
	    Auth::logout();
	    return Redirect::to('/home')
        -> with('message', 'You are now logged out');
	}


}
