@extends('master')
<!--receives $users from caller -->
<!-- [TODO] Admin users ownly -->
@section('header')
	<h2>Users</h2>
@stop
@section('content')
	<p>List users here</p>
	@foreach ($users as $user)
		{{ '<a href="/user/' . $user->id . '">' . $user->username . '</a><br />' }}
	@endforeach
@stop 