<?php

// Controller for user resource

class UserController extends \BaseController {
	
	public function __construct() {
		$this->beforeFilter('auth',
			['except' => ['create', 'store']]);
		$this->beforeFilter('guest',
			['only' => ['create', 'store']]);
		$this->beforeFilter('admin',
			['only' => ['index']]);
	}
	
	
	/**
	 * Display user list
	 *
	 * @return Response
	 */
	public function index() {
		$users = User::all();
		return View::make('user.index')->with('users', $users);
	}

	/**
	 * Show the form for registering a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;
		// [TODO] logoff if already logged in (maybe)
		return View::make('user.edit')
			->with('user', $user)
			->with('method', 'post');
	}

	/**
	 * Process new user form
	 *
	 * @return Response
	 */

	public function store()
	{
		$input = Input::all();
		$rules = array(
			'username' => 'required|unique:users',
			'name' => 'required',
			'street' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'cc_number' => 'required',
			'cc_type' => 'required'
		);
		
		$rules += ['password' => 'required|confirmed'];
		
		$validator = Validator::make($input, $rules);
		
		if ($validator ->fails()) {
			return Redirect::route('user.create')
				->withInput()
				->withErrors($validator);           
		}

		User::storeUser($input);
		
	    return View::make('home.index')
	    -> with('message', 'New user created');
	}


	/**
	 * Display a specific user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		if ($user->allowAccess($id)) {
	        return View::make('user.show') 
	        		-> with('user', $user);
        }

        return Redirect::to('/home')
        		->with('message', "User not authorized to view id {$id}");
        
	}


	/**
	 * Show the form for editing the specified user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// [TODO] Handle password change
		$user = User::find($id);
		if ($user->allowAccess($id)) {
			return View::make('user.edit')
				->with('user', $user)
				->with('method', 'put');
		}
		return Redirect::to('/home')
			->with('message', "Not authorized to edit id: {$id}");
	}

	/**
	 * Update the specified user in storage
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// [TODO] Handle password change
		$auth = Auth::user();
		if (!$auth->allowAccess($id)) {
			return Redirect::to('/home')
					->with('message', "Not authorized edit id: {$id}");
		}
		
		$input = Input::all();
		$rules = array(
			'name' => 'required',
			'street' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'cc_number' => 'required',
			'cc_type' => 'required'
		);
		
		$validator = Validator::make($input, $rules);
		
				
		if ($validator ->fails()) {
			return Redirect::to("/user/{$id}/edit")
				->withInput()
				->withErrors($validator);
		}

		User::updateUser($id, $input);
		
	    return Redirect::to('/home')
	    	-> with('message', 'User account updated');
	}

}
