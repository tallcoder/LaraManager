@extends('layouts.default')
@section('content')
<h2>ProManager Login</h2>

{{ Form::open(array('route' => 'sessions.store', 'id' => 'login')) }}
	<ul>
		<li>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</li>

		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
		<h4>{{ HTML::linkRoute('forgotpassword', 'Forgot Password?') }}</h4>
	</ul>
{{ Form::close() }}
@stop