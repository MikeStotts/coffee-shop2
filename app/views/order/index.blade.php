@extends('master')
@section('header')
    <h2>Orders</h2>
@stop
@section('content')
	<ul>
	@foreach($orders as $order)
		<li>{{ "Order id = " . $order->id }}
			{{ "username = " . $order->user->username }}
			{{ link_to("/order/{$order->id}", 'View') }}
		</li>
	@endforeach
	</ul>
@stop
