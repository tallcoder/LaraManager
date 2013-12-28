@extends('layouts.default')
@section('content')
<h3>User Overview</h3>
<p>Username: {{ $me->username }}</p>
<p>Email: {{ $me->email }}</p>
<h3>Registered Users:</h3>
	<table>
		<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
		@foreach($users as $u)
		<tr>
			<td>{{ HTML::linkRoute('users.show', $u->username, $u->id) }}</td>
			<td>{{ $u->first_name . " " . $u->last_name }}</td>
			<td>{{ HTML::mailto($u->email, $u->email) }}</td>
			<td>{{ $u->usertype }}</td>
			<td>
				{{ Form::open(array('url' => 'users/' . $u->id, 'method' => 'DELETE')) }}
				<button type="submit">Delete</button>
				{{ Form::hidden('isdeleted', '1') }}
				{{ Form::hidden('user', $u->id) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</table>
	
@stop