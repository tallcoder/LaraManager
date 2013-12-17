@extends('layouts.default')

@section('content')
<h3>Staff Overview - Projects</h3>
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
		<td>{{ HTML::linkRoute('users.show', $project->user->first_name . " " .  $project->user->last_name, array($project->user->id)) }}</td>
		<td>${{ $project->budget_used }}</td>
		<td>${{ $project->budget_total }}</td>
		<td>${{ $project->budget_total - $project->budget_used }}</td>
		<td><a href="{{ $project->url }}">Link</a></td>
		<td><a href="/projects/{{ $project->id }}/edit">Edit</a></td>
		<td>
		{{ Form::open(array('action' => ['ProjectsController@destroy', $project->id])) }}
		{{ Form::submit('Delete') }}
		{{ Form::close() }}
		</td>
	</tr>
	<tr class="description">
		<td colspan="8">{{ $project->description }}</td>
	</tr>
@endforeach
</table>
@stop