@extends('master')
@section('header')
    <h2>Shopping Cart</h2>
@stop
@section('content')
	{{ "Id = {$cart->id}, product_id = {$cart->product_id}" }}
    {{ Form::model($cart,
    	 ['autocomplete' => 'off',
    	  'url' => "user/{$user->id}/cart/{$cart->product_id}",
    	  'method' => 'delete'
    	 ]) }}
    	{{ "Id = {$cart->id}, Product Id = {$cart->product_id}"}} <br />
		{{ "Product name = {$cart->product->product_name}" }}<br />
		{{ "Description = {$cart->product->description}" }}<br />			
		{{Form::label('Quantity') }} {{Form::text('quantity') }}
    	{{ Form::submit('Delete') }}
    {{ Form::close() }}
@stop
