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

	{{ Form::open(array('route' => 'users.store', 'id' => 'new_user')) }}

	<p>
		{{ Form::label('username', 'Username') }}<br />
		{{ Form::text('username', Input::old('username')) }}
	</p>
	<p>
		{{ Form::label('first_name', 'First Name:') }}<br />
		{{ Form::text('first_name', Input::old('first_name')) }}
	</p>

	<p>
		{{ Form::label('last_name', 'Last Name:') }} <br>
		{{ Form::text('last_name', Input::old('last_name')) }}
	</p>
	<p>
		{{ Form::label('phone', 'Phone Number:') }}<br>
		{{ Form::text('phone', Input::old('phone')) }}
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
		{{ Form::label('expires', 'Expires (Leave Blank for Staff):') }}<br />
		<input type="date" name="expires" id="expires" />
	</p>
	<p>
		{{ Form::submit('Create User') }}
	</p>

	{{ Form::close() }}
@stop