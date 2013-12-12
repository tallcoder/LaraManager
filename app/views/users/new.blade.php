@extends('layouts.default')
@section('content')
	<h1>Register</h1>
	
	@if($errors->has())
		<p>The following errors have occurred:</p>
		<ul id="form-errors">
			{{ $errors->first('username', '<li>:message</li>') }}
			{{ $errors->first('password', '<li>:message</li>') }}
			{{ $errors->first('password_confirmation', '<li>:message</li>') }}
		</ul>
	@endif

	{{ Form::open(array('url' => 'register', 'method' => 'POST', 'id' => 'new_user')) }}

	<p>
		{{ Form::label('username', 'Username') }}<br />
		{{ Form::text('username', Input::old('username')) }}
	</p>
	<p>
		{{ Form::label('email', 'Email') }}<br />
		{{ Form::email('email') }}
	</p>
	<p>
		{{ Form::label('usertype', 'User Type') }}
		{{ Form::select('usertype', array('admin' => 'Admin', 'staff' => 'Staff', 'client' => 'Client'), 'client') }}
	</p>
	<p>
		{{ Form::label('password', 'Password') }}<br />
		{{ Form::password('password') }}
	</p>
	<p>
		{{ Form::label('password_confirmation', 'Confirm Password') }}<br />
		{{ Form::password('password_confirmation') }}
	</p>
	<p>
		{{ Form::submit('Register') }}
	</p>

	{{ Form::close() }}
@stop