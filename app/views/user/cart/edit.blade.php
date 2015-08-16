@extends('master')
@section('header')
    <h2>Shopping Cart</h2>
@stop
@section('content')
	<?php if ($method == 'POST') {
		$url = "/user/{$user->id}/cart?product={$cart->product_id}";
	} else {
		$url = "/user/{$user->id}/cart/{$cart->product_id}";
	} ?>
	    
		
    {{ Form::model($cart,
    	 ['autocomplete' => 'off',
    	  'url' => $url,
    	  'method' => $method
    	  ]) }}
    	  	{{ "Id = {$cart->id}, Product Id = {$cart->product_id}"}} <br />
			{{ "Product name = {$cart->product->product_name}" }}<br />
			{{ "Description = {$cart->product->description}" }}<br />			
			{{Form::label('Quantity') }} {{Form::text('quantity') }}
		    {{ 'Edit Shopping Cart Form here' }}
	   
    	{{ Form::submit('Save') }}
    {{ Form::close() }}
    {{ link_to("user/{$user->id}/cart/{$cart->product_id}/delete", 'Delete') }}
@stop
