@extends('layouts.default')
@section('content')
<h3>User Overview</h3>
<p>Username: {{ $user->username }}</p>
<p>Email: {{ $user->email }}</p>
<h3>Registered Users:</h3>
	@foreach($users as $u)
	<p>User: {{ $u->username }} -- Email: {{ $u->email }} {{ HTML::linkRoute('users.destroy', 'Delete', $u->id) }}</p>
	@endforeach
@stop