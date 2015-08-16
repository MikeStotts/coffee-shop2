<?php

class UserController extends BaseController {


	public function getUser ()
	{
		return View::make('user');
	}

	public function postCart() {
		return view::make('cart');
	}	 
}
