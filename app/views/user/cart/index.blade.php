@extends('master')
@section('header')
    <h2>Shopping Cart</h2>
@stop
@section('content')
	<?php $carts = $user->carts; ?>
   	<?php $total = 0; ?>
	<table>
		<tr>
			<th>Product Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Cost</th>
			<th></th>
			<th></th>    		
		</tr>
    	@foreach ($carts as $cart)
    		<?php
    			$product = $cart->product;
    			$product_id = $cart->product_id;
    			
    			$product_name = $product->product_name;
    			$description = $product->description;
    			$price = $product->price;
    			$quantity = $cart->quantity;
    			$cost = $price * $quantity;
    			$total += $cost;

    		 ?>
    		<tr> 
 				<td>{{ link_to("user/{$user->id}/cart/${product_id}", $product_name) }}</td>
 				<td>{{ $description }}</td>
 				<td>{{ $price }}</td>
 				<td>{{ $quantity }}</td>
 				<td>{{ $cost }}</td>
 				<td>{{link_to("user/{$user->id}/cart/{$product_id}/edit", "Edit")}}</td>
 				<td>{{link_to("user/{$user->id}/cart/{$product_id}/delete", "Delete")}}</td>
			</tr>
    	@endforeach
	</table>
	Total = {{ $total }}

	{{link_to('checkout', 'Checkout')}}
@stop
