@extends('master')
@section('header')
    <h2>Order</h2>
@stop
@section('content')
	<h3>Customer Info</h3>
	Order Date: {{ $order->created_at }}
	<ul>
		<li>User Name: {{ $order->user_name }}</li>
		<li>Email: {{ $order->email }}</li>
		<li>Phone: {{ $order->phone }}</li>
		<li>User name: {{ $order->name }}</li>
		<li>Street: {{ $order->street }}</li>
		<li>City: {{ $order->city }}</li>
		<li>State: {{ $order->state }}</li>
		<li>ZIP: {{ $order->zip }}</li>
		<li>Card Type: {{ $order->cc_type }}</li>
		<li>Card Number: {{ $order->cc_number }}</li>
	</ul>
	{{ link_to("/order", 'Back to Orders') }}
@stop
