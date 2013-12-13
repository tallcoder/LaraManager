@extends('layouts.default')
@section('content')
	<h3>Project Overview</h3>
	<table id="project">
		<tr>
			<th>Project Name</th>
			<th>Budget</th>
			<th>Completed?</th>
			<th>Dev Site</th>
		</tr>
	@include('layouts.partials._form_project')
	</table>
	<a href="/projects/{{ $project->id }}/list/create">Create Task List</a>
	<a href="/projects/{{ $project->id }}/tasks/create">Create Task</a>
@stop