@extends('master')
<!-- $user passed from caller -->
<!-- $method passed from caller -->
<!-- 	post 	= create new user 
		delete 	= delete user (admin only)
		other	= edit user
-->
<!-- [TODO] Handle password change -->
@section('header')
    <h2>
    @if ($method == 'post')
    	New User
    @else
    	Edit User {{$user->username}}
	@endif    
    </h2>
@stop
@section('content')
 
@foreach($errors->all() as $error)
	<p class="error">{{ $error }} </p>
@endforeach
{{ Form::model($user, array('autocomplete' => 'off', 
'url' => 'user/'.$user->id, 'method' => $method)) }}
	@if ($method == 'post')
		<div class="form-group">
			{{Form::label('Username')}} {{Form::text('username')}}
		</div>
	@endif
	<div class="form-group">
		{{Form::label('E-mail')}} {{Form::text('email')}}
	</div>
	<div class="form-group">
		{{Form::label('Phone')}} {{Form::text('phone')}}
	</div>
	<h3>Address</h3>
	<div class="form-group">
		{{Form::label('Name')}} {{Form::text('name')}}
	</div>
	<div class="form-group">
		{{Form::label('Street')}} {{Form::text('street')}}
	</div>
	<div class="form-group">
		{{Form::label('City')}} {{Form::text('city')}}
	</div>
	<div class="form-group">
		{{Form::label('State')}} {{Form::text('state')}}
	</div>
	<div class="form-group">
		{{Form::label('ZIP')}} {{Form::text('zip')}}
	</div>
	<h3>Credit Card</h3>
	<div class="form-group">
		{{Form::label('Card #')}} {{Form::text('cc_number')}}
	</div>
	<div class="form-group">
		{{Form::label('Card Type')}} {{Form::text('cc_type')}}
	</div>
	@if ($method == 'post')
		<h3>Password</h3>
		<div class="form-group">
			{{Form::label('Password')}} {{Form::password('password')}}
		</div>
		<div class="form-group">
			{{Form::label('Confirm Password')}} {{Form::password('password_confirmation')}}
		</div>
	@endif
	{{Form::submit('Save',
		['class' => 'btn btn-default']) }}
{{ Form::close() }}

@stop