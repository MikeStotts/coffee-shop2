<?php

class ProductController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',
			['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the Products.
	 *
	 * @return Response
	 */
	public function index()
	{
  		$products = Product::all();
		return View::make('product.index')
			->with(['products' => $products]);
	}


	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{
  		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to create new prodcut');
  		}
  			
  		$product = new Product;
		return View::make('product.edit')
			->with('product', $product)
			->with('method', 'post');
	}


	/**
	 * Store a newly created Product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

  		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to create new prodcut');
  		}

		$input = Input::all();		
		$rules = array(
			'product_name' => 'required|unique:products',
			'description' => 'required',
			'price' => 'required'
		);
		
		$validator = Validator::make($input, $rules);
		
		if ($validator ->fails()) {
			return Redirect::route('product.create')
				->withInput()
				->withErrors($validator);           
		}
		
		Product::storeProduct($input);
	    return Redirect::to('/product')
	    -> with('message', 'New product created');
	}


	/**
	 * Display the specified Product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
  		$prod = Product::find($id);
		return View::make('product.show')
				->with('product', $prod) ;
	}


	/**
	 * Show the form for editing the specified Product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
  		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to edit product');
  		}

  		$prod = Product::find($id);
		return View::make('product.edit')
			->with('method', 'put')
			->with('product', $prod);
	}


	/**
	 * Update the specified Product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
 		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to create new prodcut');
  		}

		$rules = array(
			'description' => 'required',
			'price' => 'required'
		);
		
		
		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator ->fails()) {
			$product = Product::find($id);
			return Redirect::to("/product/{$id}/edit")				->withInput()
				->withErrors($validator);           
		}

		$product = Product::find($id);
		$product->description = Input::get('description');
		$product->price = Input::get('price');
	
	    $product->save();
	    return Redirect::to('/product')
		    -> with('message', "Product id = {$id} updated");
	}


	public function getDelete($id) {
  		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to delete product');
  		}

  		$prod = Product::find($id);
		return View::make('product.edit')
			->with('method', 'delete')
			->with('product', $prod);
	}
	
	/**
	 * Remove the specified Product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
  		// [TODO] Remove the specified Product from storage.
 		if (!Auth::check() || !Auth::user()->isAdmin()) {
  			return Redirect::to('/product')
  				->with('message', 'Not authorized to delete product');
  		}

  		$product = Product::find($id);
  		$product->delete();
  		return Redirect::to('/product')
  			->with('message', "Product id = {$id} deleted");
	}


}
