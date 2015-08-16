@extends('master')
@section('header')
    <h2>Shopping Cart</h2>
@stop
@section('content')
    {{ 'Show cart item here' }}
    <?php
    	$product = $cart->product;
    	$product_id = $product->id;
    	$product_name = $product->product_name;
    	$description = $product->descirption;
    	$price = $product->price;
    	$quantity = $cart->quantity;
    	$cost = $quantity * $price; 
    ?>
    Product Id = {{$product_id}}
    	<ul>
		<li>Description: {{ $description }}</li>
			<li>Product Name: {{ $product_name }}</li>
 			<li>Price: {{ $price }}</li>
 			<li>Quantity: {{ $quantity }}</li>
 			<li>Cost: {{ $cost }}</li>
		</ul>
	</li>
	{{ link_to("user/{$user->id}/cart/{$product_id}/edit", 'Edit') }}
    
@stop
