<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Triton Coffee Shop</title>
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap-theme.min.css')}}">
		<script src="{{URL::asset('js/jquery-2.1.3.min.js')}}"></script>
		<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
        	<span class="pull-left">
			{{link_to('home', 'Home',
				['class' => 'btn btn-info'] )}} 
			@if (Auth::check())
				<?php $id = Auth::user()->id; ?>
				{{link_to("/user/{$id}/cart",
					'Shopping cart',
					['class' => 'btn btn-info'] )}} 

			@endif
			</span>
			<span class="pull-right">
			@if (Auth::check())
				{{link_to('/user/'.Auth::user()->id, Auth::user()->username,
					['class' => 'btn btn-info'])}}
				{{link_to('/logoff', 'Log out',
					['class' => 'btn btn-info'] )}}				
			@else
				{{link_to('/user/create', 'Create Account',
					['class' => 'btn btn-info'] )}}				
				{{link_to('/login', 'Log in',
					['class' => 'btn btn-info'] )}}				
			@endif
			</span>
			
			<div class="page-header">
	            <h1>Triton Coffee</h1>
            </div>

            @yield('header')
            @if (Session::has('message')) 
            <div class="alert alert alert-info">
                    {{ Session::get('message'); }}
            </div>
            @endif
            <main>
            @yield('content')
            </main>
        </div>
    </body>
</html>
