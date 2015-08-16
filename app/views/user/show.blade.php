@extends('master')
@section('header')
    <h2>User Info <small> {{link_to("/user/{$user->id}/edit", 'Edit User Info')}}
</small></h2>
@stop
@section('content')
    <h3>User record</h3>
    <ul>
        <li>Id: {{ $user->id }}</li>
        <li>Username: {{ $user->username }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Password: {{ $user->password }}</li>
        <li>Phone: {{ $user->phone}}</li>
    </ul>
    <h3>Address</h3>
    <ul>
        <li>Name: {{ $user->name}}</li>
        <li>Street: {{ $user->street }}</li>
        <li>City: {{ $user->city}}</li>
        <li>State: {{ $user->state}}</li>
        <li>ZIP: {{ $user->zip}}</li>
    </ul>
    <h3>Credit Card record</h3>
    <ul>
        <li>Card #: {{ $user->cc_number}}</li>
        <li>Card type: {{ $user->cc_type}}</li>
    </ul>
    <h3>{{ link_to('user/' . $user->id . '/cart', 'Shopping Cart') }}</h3>
    <h3>Orders</h3>
        <?php $orders = $user->orders ?>
        <ul>
        @foreach ($orders as $order)
            <li>Order Id:{{ $order->id }}</li>
            <?php $total = 0; ?>
            <ul>
            @foreach($order->orderItems as $orderItem)
                <li>Item Id = {{ $orderItem->id }}
                    <ul>
                        <?php 
                       		$product = Product::find($orderItem->product_id);
                    		$product_name = $product->product_name;
                            $description = $product->description;
                            $price = $orderItem->price;
                            $quantity = $orderItem->quantity;
                            $cost = $price * $quantity;
                            $total += $cost;
                        ?>
                        <li>Product: {{ $product_name }}</li>
                        <li>Description: {{ $description}}</li>
                        <li>Price: {{ $price}}</li>
                        <li>Quantitiy: {{ $orderItem->quantity }}</li>
                        <li>Cost: {{ $cost }}</li>
                    </ul>
                </li>
            @endforeach
            <li>Total: {{ $total}}</li>
            </ul>
        @endforeach
        </ul>
@stop
