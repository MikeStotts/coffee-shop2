@extends('master')
@section('header')
   <h2>Login</h2>
@stop
@section('content')
	@foreach($errors->all() as $error)
	<p class="error">{{ $error }} </p>
@endforeach
	{{ Form::open(array('autocomplete' => 'off', 'url' => 'login')) }}
		<div class="form-group">
			{{Form::label('Username')}} {{Form::text('username')}}
		</div>
		<div class="form-group">
			{{Form::label('Password')}} {{Form::password('password')}}
		</div>
		<div class="form-group">
			{{Form::label('Remember me?')}} {{Form::checkbox('remember')}}
		</div>
		{{Form::submit('Login')}}
	{{ Form::close() }}
@stop
