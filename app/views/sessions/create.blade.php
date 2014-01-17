@extends('defaults.layout')

@section('content')
<h2>LaraManager Login</h2>
{{ Form::open(array('route' => 'sessions.store')) }}
	<ul>
		<li>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</li>

		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>

		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}

		</li>

		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}

@stop