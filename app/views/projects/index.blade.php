@extends('layouts.default')

@section('content')
<h3>Staff Overview - Projects</h3>
<p>You are logged in as {{ $user->username }}</p>
<table class="projects">
	<tr class="header">
		<th>Name</th>
		<th>Client</th>
		<th>Budget Used</th>
		<th>Budget Total</th>
		<th>Budget Remaining</th>
		<th>Dev Site</th>
	</tr>
@foreach($projects as $project)
	<tr class="project">
		<td><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></td>
		<td>{{ $project->client_name }}</td>
		<td>{{ $project->budget_used }}</td>
		<td>{{ $project->budget_total }}</td>
		<td>{{ $project->budget_total - $project->budget_used }}</td>
		<td><a href="{{ $project->url }}">Link</a></td>
		<td><a href="/projects/{{ $project->id }}/edit">Edit</a></td>
	</tr>
	<tr class="description">
		<td colspan="5">{{ $project->description }}</td>
	</tr>
@endforeach
</table>


@stop