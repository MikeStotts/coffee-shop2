<?php

class CartController extends \BaseController {

	/**
	 * Display all shopping carts 
	 *
	 * @return Response
	 */
	public function index($id)
	{
		// [TODO check for user identity or admin
		
        $user = User::find($id);
        if (isset($user)) {
            return View::make('user.cart.index') 
            	-> with('user', $user); 
        } 
        
        return Redirect::to('home')
        	->with('message', 'Unknown user');
	}


	/**
	 * Show the form for creating a new shopping cart
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		// [TODO check for user identity or admin]
		$user = User::find($user_id);
		$id = $_GET['product'];
 		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();

		if (!isset($cart)) {
			$cart = new Cart;
			$cart->user_id = $user_id;
			$cart->product_id = $id;
			$cart->quantity = 0;
		}
		return View::make('user.cart.edit')
			->with('user', $user)
			->with('cart', $cart)
			->with('method', 'POST');
	}
	

	/**
	 * Store a newly created shopping cart in storage
	 *
/	 * @return Response
	 */
	public function store($user_id)
	{
		// [TODO] Store a newly created shopping cart in storage
		$user = User::find($user_id);
		$id = $_GET['product'];
 		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();

		if (!isset($cart)) {
			$cart = new Cart;
			$cart->user_id = $user_id;
			$cart->product_id = $id;
		}
		$cart->quantity = Input::get('quantity');
		$cart->save();
		return Redirect::to("/user/{$user_id}/cart");
	}


	/**
	 * Display the specified shopping cart.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id, $id)
	{
		// [TODO] Display the specified shopping cart. 

		$user = User::find($user_id);
		$cart = $user->carts()
				->where('product_id', '=', "{$id}")
				->first();
		
		return View::make('user.cart.show')
			->with('user', $user)
			->with('cart', $cart);
	}


	/**
	 * Show the form for editing the specified shopping cart.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($user_id, $id)
	{
		// [TODO check for user identity or admin]
		// [TODO] Show the form for editing the specified shopping cart.
		$user = User::find($user_id);
  		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();
		
		return View::make('user.cart.edit')
			->with('user', $user)
			->with('cart', $cart)
			->with('method', 'put');
	}


	/**
	 * Update a shopping cart in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($user_id, $id)
	{
		// [TODO check for user identity or admin]
		// [TODO] Update a shopping cart in storage.
		$user = User::find($user_id);
  		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();
  		$cart->quantity = Input::get('quantity');
  		$cart->save();		
		return Redirect::to("user/{$user_id}/cart")
			->with('message', "Cart id = {$cart->id} updated");
	}

	public function getDelete($userId, $id) {

		$user = User::find($userId);
  		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();

		return View::make('user.cart.delete')
			->with('user', $user)
			->with('cart', $cart);
	}


	/**
	 * Remove a shopping cart from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userId, $id)
	{
		// [TODO check for user identity or admin]
		// [TODO] Remove a shopping cart from storage.
		$user = User::find($userId);
  		$cart = $user
  				->carts()
  				->where('product_id', '=', "{$id}")
  				->first();
  		$cart->delete();
  		return Redirect::to("/user/{$user->id}/cart")
  			->with('message', "Cart id = {$id} deleted");
	}


}
