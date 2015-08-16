@extends('master')
<?php 
	/**
	 * @param $products - list of products
	 */
?>
@section('header')
    <h2>Products</h2>
@stop
@section('content')
	<table>
    @foreach($products as $product)
    	<tr>
	        <td>{{ link_to('/product/'.$product->id, $product -> description)}}</td>
	        <td>{{ $product -> price }}</td>
	    </tr>
    @endforeach
    </table>
    @if (Auth::check() && Auth::user()->isAdmin())
    	{{ link_to('/product/create', 'Add new product') }}
    @endif
    
@stop
