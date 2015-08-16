<?php
class Product extends Eloquent {
	
	protected $table = 'products';
	
	public static function storeProduct($input) {

		$errors = [];
		$product = new Product;
		$product->product_name = $input['product_name'];
		$product->description = $input['description'];
		$product->price = $input['price'];
	
	    $product->save();

		return $product->with($errors);
	}
}
