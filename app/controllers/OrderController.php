<?php 

// Controller for Order resource

class OrderController extends Controller {

	// [TODO] must be logged on 
	/**
	 * Display a listing of all orders
	 * GET /order
	 *
	 * @return Response
	 */
	public function index()
	{
		// [TODO] Display a listing of all orders
		$user = Auth::user();
		if ($user->isAdmin()) {
			$orders = Order::all();		
		} else {
			$orders = $user->orders;
		}
		
		return View::make('order.index')
			->with(['orders' => $orders]);
	}

	/**
	 * Show the form for creating a new order
	 * GET /order/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// [TODO] Show form for creating a new order  
		return 'Show form for creating a new order';
	}

	/**
	 * Store a newly created order in storage.
	 * POST /order
	 *
	 * @return Response
	 */
	public function store()
	{
		// [TODO] Store a newly created order in storage.  
		return 'Store a newly created order in storage.';
	}

	/**
	 * Display the specified order
	 * GET /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// [TODO] Display the specified Order  
		$order = Order::find($id);
		return View::make('order.show')
				->with('order', $order);
	}

	/**
	 * Show the form for editing the specified order.
	 * GET /order/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// [TODO] Show the form for editing the specified order.  
		return 'Show the form for editing the specified order.';
	}

	/**
	 * Update the specified order in storage.
	 * PUT /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// [TODO] Update the specified order in storage.  
		return 'Update the specified order in storage.';
	}

	/**
	 * Remove the specified order from storage.
	 * DELETE /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// [TODO] Remove the specified order from storage.  
		return 'Remove the specified order from storage.';
	}

}