@extends('master')
@section('header')
    <h2>Product {{ $product->product_name }}</h2>
@stop
@section('content')
	<ul>
		<li>Id: {{ $product->id}}</li>
		<li>Name: {{ $product->product_name }}</li>
		<li>Description: {{ $product->description }}</li>
		<li>Price: {{ $product->price }}</li>
	</ul>
	@if (Auth::check())
		<?php $user_id = Auth::user()->id; ?>
		{{ link_to("/user/{$user_id}/cart/create?product={$product->id}",
			'Order') }}
	@endif
	{{ link_to('/product', 'Products') }}
	@if (Auth::check() && Auth::user()->isAdmin())
		{{ link_to("/product/{$product->id}/edit", 'Edit') }}
		{{ link_to("/product/{$product->id}/delete", 'Delete') }}
	@endif
@stop
