@extends('layouts.default')
@section('content')
<h3>User Overview</h3>
<p>Username: {{ $user->usernmae }}</p>
<p>Email: {{ $user->email }}</p>
<h3>Current Projects:</h3>
<tr>
			<th>Name</th>
			<th>Total Budget</th>
			<th>Completed?</th>
			<th>Dev Site</th>
		</tr>
@foreach($projects as $project)
	<table id="projects">
		<tr>
			<td><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></td>
			<td>{{ $project->budget_total }}</td>
			<td>{{ $project->completed }}</td>
			<td><a href="{{ $project->url }}">Link</a></td>
		</tr>
		<tr>
			<td colspan="5">{{ $project->description }}</td>
		</tr>
@endforeach
	</table>
@stop