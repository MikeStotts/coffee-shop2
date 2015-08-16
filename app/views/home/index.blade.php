@extends('master')

@section('header')
	<h2>Home</h2>
@stop
@section('content')
	<ul type="none">
		@if (Auth::check() && Auth::user()->isAdmin())
			<li>{{ link_to('user', 'Users',
				['class' => 'btn btn-info']) }}</li>
		@endif
		<li>{{ link_to('product', 'Products',
			['class' => 'btn btn-info']) }}</li>
	</ul>
@stop