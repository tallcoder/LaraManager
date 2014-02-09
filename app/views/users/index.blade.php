@extends('layouts.default')
@section('content')
<h3>User Overview</h3>
<p>Username: {{ $me->username }}</p>
<p>Email: {{ $me->email }}</p>
<h3>Registered Users:</h3>
	<table class="table-striped table-bordered">
		<thead>
		<tr>
			<th data-sort="string">Username</th>
			<th data-sort="string">Name</th>
			<th data-sort="string">Email</th>
			<th data-sort="string">Status</th>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $u)
		<tr>
			<td>{{ HTML::linkRoute('users.show', $u->username, $u->id) }}</td>
			<td>{{ $u->first_name . " " . $u->last_name }}</td>
			<td>{{ HTML::mailto($u->email, $u->email) }}</td>
			<td>{{ $u->usertype }}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	
@stop